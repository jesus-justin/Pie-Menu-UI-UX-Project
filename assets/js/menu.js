(() => {
  'use strict';
  
  // Menu configuration and state management
  const shell = document.querySelector(".ring-shell");
  const ring = document.getElementById("kando-ring");
  const toggle = document.getElementById("menuToggle");
  const chipToggle = document.getElementById("chipToggle");
  const tooltip = document.getElementById("menuTooltip");
  const centerTitle = document.getElementById("centerTitle");
  const centerDesc = document.getElementById("centerDesc");
  const items = Array.isArray(window.KANDO_MENU) ? window.KANDO_MENU : [];
  let itemNodes = [];
  let open = false;

  if (!shell || !ring || !toggle) return;

  const parseRadius = () => {
    const r = getComputedStyle(ring).getPropertyValue("--ring-radius");
    const value = parseFloat(r);
    return Number.isFinite(value) ? value : 200;
  };

  const parseItemSize = () => {
    const size = getComputedStyle(ring).getPropertyValue("--item-size");
    const value = parseFloat(size);
    return Number.isFinite(value) ? value : 74;
  };

  const setOpen = (next) => {
    open = Boolean(next);
    shell.dataset.open = String(open);
    toggle.setAttribute("aria-expanded", String(open));
    toggle.querySelector(".toggle-label").textContent = open ? "Close menu" : "Open menu";
    toggle.querySelector(".toggle-sub").textContent = open ? "Press arrows to move" : `${itemNodes.length} focusable actions`;
    if (!open) {
      hideTooltip();
      setCenter("Open menu", "Press the toggle to explore the actions.");
    } else if (items.length) {
      setCenter(items[0].label, items[0].description);
    }
  };

  const hideTooltip = () => {
    if (tooltip) {
      tooltip.dataset.active = "false";
      tooltip.textContent = "";
    }
  };

  const showTooltip = (item) => {
    if (!tooltip || !item) return;
    tooltip.textContent = `${item.label} — ${item.description}`;
    tooltip.dataset.active = "true";
  };

  const setCenter = (title, description) => {
    if (centerTitle) centerTitle.textContent = title;
    if (centerDesc) centerDesc.textContent = description;
  };

  const focusItem = (index) => {
    if (!itemNodes.length) return;
    const count = itemNodes.length;
    const normalized = ((index % count) + count) % count;
    const node = itemNodes[normalized];
    node.focus();
  };

  const handleActivate = (node) => {
    const target = node?.dataset?.href;
    if (!target) return;
    
    // Provide haptic feedback if available
    if (navigator.vibrate) {
      navigator.vibrate(50);
    }
    
    if (target.startsWith("#")) {
      const el = document.querySelector(target);
      if (el) {
        el.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    } else {
      window.open(target, "_blank", "noopener");
    }
  };

  const build = () => {
    const radius = parseRadius();
    const itemSize = parseItemSize();
    const step = (Math.PI * 2) / Math.max(items.length, 1);
    const start = -Math.PI / 2;
    const lineLen = Math.max(radius - itemSize * 0.5, 80);

    const frag = document.createDocumentFragment();
    items.forEach((item, index) => {
      const angle = start + step * index;
      const x = Math.cos(angle) * radius;
      const y = Math.sin(angle) * radius;
      const deg = (angle * 180) / Math.PI;

      const button = document.createElement("button");
      button.className = "menu-item";
      button.type = "button";
      button.style.setProperty("--x", `${x}px`);
      button.style.setProperty("--y", `${y}px`);
      button.style.setProperty("--angle", `${deg}deg`);
      button.style.setProperty("--line-len", `${lineLen}px`);
      button.style.setProperty("--delay", `${index * 40}ms`);
      if (item.color) button.style.setProperty("--item-color", item.color);
      button.dataset.index = String(index);
      button.dataset.href = item.href || "#";
      button.setAttribute("aria-label", `${item.label}. ${item.description}`);
      button.innerHTML = `<span class="label">${item.label}</span>`;

      button.addEventListener("mouseenter", () => {
        showTooltip(item);
        setCenter(item.label, item.description);
      });
      button.addEventListener("focus", () => {
        showTooltip(item);
        setCenter(item.label, item.description);
      });
      button.addEventListener("mouseleave", hideTooltip);
      button.addEventListener("blur", hideTooltip);
      button.addEventListener("click", () => handleActivate(button));

      frag.appendChild(button);
    });

    ring.innerHTML = "";
    ring.appendChild(frag);
    itemNodes = Array.from(ring.querySelectorAll(".menu-item"));
  };

  const handleKey = (event) => {
    if (!open) return;
    const { key } = event;
    const active = document.activeElement;
    const activeIndex = Number(active?.dataset?.index ?? 0);

    if (key === "ArrowRight" || key === "ArrowDown") {
      event.preventDefault();
      focusItem(activeIndex + 1);
    }
    if (key === "ArrowLeft" || key === "ArrowUp") {
      event.preventDefault();
      focusItem(activeIndex - 1);
    }
    if (key === "Enter" || key === " ") {
      event.preventDefault();
      handleActivate(active);
    }
    if (key === "Escape") {
      setOpen(false);
      toggle.focus();
    }
  };

  const wire = () => {
    build();

    const clickToggle = () => setOpen(!open);
    toggle.addEventListener("click", clickToggle);
    toggle.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        clickToggle();
      }
    });

    if (chipToggle) {
      chipToggle.addEventListener("click", clickToggle);
      chipToggle.addEventListener("keydown", (event) => {
        if (event.key === "Enter" || event.key === " ") {
          event.preventDefault();
          clickToggle();
        }
      });
    }

    ring.addEventListener("keydown", handleKey);
    setOpen(false);
  };

  wire();
})();
