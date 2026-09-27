/* @ds-bundle: {"format":4,"namespace":"RasheeEnterprisesDesignSystem_cf8188","components":[{"name":"Icon","sourcePath":"components/brand/Icon.jsx"},{"name":"Logo","sourcePath":"components/brand/Logo.jsx"},{"name":"Button","sourcePath":"components/core/Button.jsx"},{"name":"IconButton","sourcePath":"components/core/IconButton.jsx"},{"name":"Badge","sourcePath":"components/data/Badge.jsx"},{"name":"Card","sourcePath":"components/data/Card.jsx"},{"name":"Tag","sourcePath":"components/data/Tag.jsx"},{"name":"Dialog","sourcePath":"components/feedback/Dialog.jsx"},{"name":"Toast","sourcePath":"components/feedback/Toast.jsx"},{"name":"Tooltip","sourcePath":"components/feedback/Tooltip.jsx"},{"name":"Checkbox","sourcePath":"components/forms/Checkbox.jsx"},{"name":"Input","sourcePath":"components/forms/Input.jsx"},{"name":"RadioGroup","sourcePath":"components/forms/RadioGroup.jsx"},{"name":"Select","sourcePath":"components/forms/Select.jsx"},{"name":"Switch","sourcePath":"components/forms/Switch.jsx"},{"name":"Tabs","sourcePath":"components/navigation/Tabs.jsx"}],"sourceHashes":{"components/brand/Icon.jsx":"582132cc0c26","components/brand/Logo.jsx":"df3a0d692695","components/core/Button.jsx":"126b827c8d2e","components/core/IconButton.jsx":"a7ab828839ff","components/data/Badge.jsx":"92eeda9ea94c","components/data/Card.jsx":"2e04287a81f8","components/data/Tag.jsx":"72d0465ba7cf","components/feedback/Dialog.jsx":"c2baef7c1b86","components/feedback/Toast.jsx":"94aa647e5790","components/feedback/Tooltip.jsx":"9bc6096857a9","components/forms/Checkbox.jsx":"1b44f6e573c3","components/forms/Input.jsx":"077230fecdaa","components/forms/RadioGroup.jsx":"3d72abafcec4","components/forms/Select.jsx":"aa05e38a068a","components/forms/Switch.jsx":"5ce8bc87fadb","components/navigation/Tabs.jsx":"68322f7733ec","ui_kits/portal/Portal.jsx":"92b4fc96304e","ui_kits/website/Chrome.jsx":"d3477cf88ed2","ui_kits/website/HomePage.jsx":"191e1dde58ee","ui_kits/website/ProductsPage.jsx":"a1219d28cf70"},"inlinedExternals":[],"unexposedExports":[]} */

(() => {

const __ds_ns = (window.RasheeEnterprisesDesignSystem_cf8188 = window.RasheeEnterprisesDesignSystem_cf8188 || {});

const __ds_scope = {};

(__ds_ns.__errors = __ds_ns.__errors || []);

// components/brand/Icon.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Icon — thin wrapper over Lucide (the brand's chosen icon system).
 * Requires the Lucide UMD script on the page:
 *   <script src="https://unpkg.com/lucide@latest"></script>
 * Renders an <i data-lucide> and (re)hydrates it via lucide.createIcons().
 * Inherits color from `currentColor`; stroke width 2 matches the brand's
 * clean, professional line style.
 */
function Icon({
  name,
  size = 20,
  strokeWidth = 2,
  color = "currentColor",
  className = "",
  style = {},
  ...rest
}) {
  const ref = React.useRef(null);
  React.useEffect(() => {
    const el = ref.current;
    if (!el) return;
    // Reset so Lucide re-processes on name change
    el.innerHTML = "";
    el.setAttribute("data-lucide", name);
    if (typeof window !== "undefined" && window.lucide && window.lucide.createIcons) {
      window.lucide.createIcons({
        attrs: {
          width: size,
          height: size,
          "stroke-width": strokeWidth
        },
        nameAttr: "data-lucide"
      });
    }
  }, [name, size, strokeWidth]);
  return /*#__PURE__*/React.createElement("i", _extends({
    ref: ref,
    "data-lucide": name,
    className: className,
    style: {
      display: "inline-flex",
      width: size,
      height: size,
      color,
      lineHeight: 0,
      verticalAlign: "middle",
      ...style
    }
  }, rest));
}
Object.assign(__ds_scope, { Icon });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/brand/Icon.jsx", error: String((e && e.message) || e) }); }

// components/brand/Logo.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Rashee Enterprises logo lockups. Renders the real brand PNG assets.
 * Never re-draw the mark — always use these files.
 *
 * Asset resolution: assets live at <ds-root>/assets/. We locate the design-system
 * root from the loaded _ds_bundle.js <script> tag (works from any card / UI-kit path),
 * falling back to import.meta.url, then to a project-relative path.
 */
function dsRoot() {
  if (typeof document !== "undefined") {
    const s = document.querySelector('script[src*="_ds_bundle.js"]');
    if (s && s.src) return s.src.replace(/_ds_bundle\.js.*$/, "");
    // consuming projects: bound under _ds/<folder>/
    const link = document.querySelector('link[href*="styles.css"]');
    if (link && link.href) return link.href.replace(/styles\.css.*$/, "");
  }
  // Optional global override, e.g. window.RASHEE_DS_BASE = "/assets/root/";
  if (typeof window !== "undefined" && window.RASHEE_DS_BASE) return window.RASHEE_DS_BASE;
  return "";
}
function assetUrl(file) {
  return dsRoot() + "assets/" + file;
}
const FILES = {
  "full-color": "logos/logo.png",
  "full-white": "logos/white-logo.png",
  "full-mono": "logos/mono-logo.png",
  "full-grayscale": "logos/grayscale-logo.png",
  "full-inverted": "logos/inverted-logo.png",
  "mark-color": "logos/symbol.png",
  "mark-white": "logos/white-symbol.png",
  "mark-mono": "logos/mono-symbol.png",
  "mark-grayscale": "logos/symbol.png",
  "mark-inverted": "logos/inverted-symbol.png"
};
// Legacy aliases
FILES["full-black"] = FILES["full-mono"];
FILES["mark-black"] = FILES["mark-mono"];
function Logo({
  variant = "full",
  tone = "color",
  height,
  width,
  className = "",
  style = {},
  alt = "Rashee Enterprises",
  ...rest
}) {
  const key = `${variant === "mark" ? "mark" : "full"}-${tone}`;
  const file = FILES[key] || FILES["full-color"];
  const defaultH = variant === "mark" ? 40 : 52;
  const h = height != null ? typeof height === "number" ? `${height}px` : height : `${defaultH}px`;
  return /*#__PURE__*/React.createElement("img", _extends({
    src: assetUrl(file),
    alt: alt,
    className: className,
    draggable: false,
    style: {
      height: h,
      width: width != null ? typeof width === "number" ? `${width}px` : width : "auto",
      display: "block",
      userSelect: "none",
      ...style
    }
  }, rest));
}
Object.assign(__ds_scope, { Logo });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/brand/Logo.jsx", error: String((e && e.message) || e) }); }

// components/core/Button.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Button — primary interactive control for Rashee Enterprises.
 * Variants map to the brand: primary = Picton Blue, accent = brand gold,
 * outline / ghost for secondary actions, danger for destructive.
 */
const SIZES = {
  sm: {
    padding: "0 var(--space-3)",
    height: 34,
    fontSize: "var(--text-sm)",
    gap: 6,
    icon: 16
  },
  md: {
    padding: "0 var(--space-5)",
    height: 42,
    fontSize: "var(--text-base)",
    gap: 8,
    icon: 18
  },
  lg: {
    padding: "0 var(--space-6)",
    height: 52,
    fontSize: "var(--text-md)",
    gap: 10,
    icon: 20
  }
};
const VARIANTS = {
  primary: {
    background: "var(--color-primary)",
    color: "var(--text-on-primary)",
    border: "1px solid var(--color-primary)",
    boxShadow: "var(--shadow-brand)",
    hoverBg: "var(--color-primary-hover)",
    activeBg: "var(--color-primary-active)"
  },
  accent: {
    background: "var(--rs-gold-600)",
    color: "#fff",
    border: "1px solid var(--rs-gold-600)",
    boxShadow: "0 8px 20px rgba(167,125,49,.26)",
    hoverBg: "var(--rs-gold-700)",
    activeBg: "var(--rs-gold-900)"
  },
  outline: {
    background: "transparent",
    color: "var(--color-primary)",
    border: "1px solid var(--border-default)",
    boxShadow: "none",
    hoverBg: "var(--color-primary-subtle)",
    activeBg: "var(--rs-blue-100)"
  },
  ghost: {
    background: "transparent",
    color: "var(--text-body)",
    border: "1px solid transparent",
    boxShadow: "none",
    hoverBg: "var(--surface-muted)",
    activeBg: "var(--rs-neutral-200)"
  },
  danger: {
    background: "var(--rs-danger)",
    color: "#fff",
    border: "1px solid var(--rs-danger)",
    boxShadow: "0 8px 20px rgba(217,75,63,.24)",
    hoverBg: "#c53f34",
    activeBg: "#a93529"
  }
};
function Button({
  children,
  variant = "primary",
  size = "md",
  fullWidth = false,
  disabled = false,
  loading = false,
  leftIcon = null,
  rightIcon = null,
  type = "button",
  className = "",
  style = {},
  ...rest
}) {
  const s = SIZES[size] || SIZES.md;
  const v = VARIANTS[variant] || VARIANTS.primary;
  const [state, setState] = React.useState("idle");
  const isOff = disabled || loading;
  const bg = isOff ? undefined : state === "active" ? v.activeBg : state === "hover" ? v.hoverBg : v.background;
  return /*#__PURE__*/React.createElement("button", _extends({
    type: type,
    disabled: isOff,
    className: className,
    onMouseEnter: () => !isOff && setState("hover"),
    onMouseLeave: () => setState("idle"),
    onMouseDown: () => !isOff && setState("active"),
    onMouseUp: () => !isOff && setState("hover"),
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      gap: s.gap,
      height: s.height,
      padding: s.padding,
      width: fullWidth ? "100%" : "auto",
      fontFamily: "var(--font-body)",
      fontWeight: "var(--weight-semibold)",
      fontSize: s.fontSize,
      lineHeight: 1,
      letterSpacing: "0.005em",
      color: v.color,
      background: bg,
      border: v.border,
      borderRadius: "var(--radius-md)",
      boxShadow: state === "active" || variant === "outline" || variant === "ghost" ? "none" : v.boxShadow,
      cursor: isOff ? "not-allowed" : "pointer",
      opacity: isOff && !loading ? 0.5 : 1,
      transform: state === "active" ? "translateY(1px)" : "none",
      transition: "background var(--duration-fast) var(--ease-standard), transform var(--duration-fast) var(--ease-standard), box-shadow var(--duration-fast) var(--ease-standard)",
      whiteSpace: "nowrap",
      userSelect: "none",
      ...style
    }
  }, rest), loading && /*#__PURE__*/React.createElement("span", {
    style: {
      width: s.icon,
      height: s.icon,
      borderRadius: "50%",
      border: "2px solid currentColor",
      borderTopColor: "transparent",
      display: "inline-block",
      animation: "rs-spin .7s linear infinite"
    }
  }), !loading && leftIcon, children != null && /*#__PURE__*/React.createElement("span", null, children), !loading && rightIcon, /*#__PURE__*/React.createElement("style", null, "@keyframes rs-spin{to{transform:rotate(360deg)}}"));
}
Object.assign(__ds_scope, { Button });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Button.jsx", error: String((e && e.message) || e) }); }

// components/core/IconButton.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * IconButton — square, icon-only control. Pass a single Icon as children.
 */
const SIZES = {
  sm: 32,
  md: 40,
  lg: 48
};
const VARIANTS = {
  solid: {
    background: "var(--color-primary)",
    color: "#fff",
    border: "1px solid var(--color-primary)",
    hoverBg: "var(--color-primary-hover)",
    activeBg: "var(--color-primary-active)"
  },
  soft: {
    background: "var(--color-primary-subtle)",
    color: "var(--color-primary)",
    border: "1px solid transparent",
    hoverBg: "var(--rs-blue-100)",
    activeBg: "var(--rs-blue-200)"
  },
  outline: {
    background: "transparent",
    color: "var(--text-body)",
    border: "1px solid var(--border-default)",
    hoverBg: "var(--surface-muted)",
    activeBg: "var(--rs-neutral-200)"
  },
  ghost: {
    background: "transparent",
    color: "var(--text-muted)",
    border: "1px solid transparent",
    hoverBg: "var(--surface-muted)",
    activeBg: "var(--rs-neutral-200)"
  }
};
function IconButton({
  children,
  variant = "ghost",
  size = "md",
  disabled = false,
  round = false,
  "aria-label": ariaLabel,
  className = "",
  style = {},
  ...rest
}) {
  const dim = SIZES[size] || SIZES.md;
  const v = VARIANTS[variant] || VARIANTS.ghost;
  const [state, setState] = React.useState("idle");
  const bg = disabled ? undefined : state === "active" ? v.activeBg : state === "hover" ? v.hoverBg : v.background;
  return /*#__PURE__*/React.createElement("button", _extends({
    type: "button",
    "aria-label": ariaLabel,
    disabled: disabled,
    className: className,
    onMouseEnter: () => !disabled && setState("hover"),
    onMouseLeave: () => setState("idle"),
    onMouseDown: () => !disabled && setState("active"),
    onMouseUp: () => !disabled && setState("hover"),
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: dim,
      height: dim,
      padding: 0,
      color: v.color,
      background: bg,
      border: v.border,
      borderRadius: round ? "var(--radius-pill)" : "var(--radius-md)",
      cursor: disabled ? "not-allowed" : "pointer",
      opacity: disabled ? 0.5 : 1,
      transition: "background var(--duration-fast) var(--ease-standard)",
      ...style
    }
  }, rest), children);
}
Object.assign(__ds_scope, { IconButton });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/IconButton.jsx", error: String((e && e.message) || e) }); }

// components/data/Badge.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Badge — small status / category label. Soft (tinted) or solid.
 */
const TONES = {
  neutral: {
    soft: ["var(--surface-muted)", "var(--rs-neutral-700)"],
    solid: ["var(--rs-neutral-700)", "#fff"]
  },
  primary: {
    soft: ["var(--color-primary-subtle)", "var(--rs-blue-700)"],
    solid: ["var(--color-primary)", "#fff"]
  },
  gold: {
    soft: ["var(--rs-gold-100)", "var(--rs-gold-700)"],
    solid: ["var(--rs-gold-600)", "#fff"]
  },
  success: {
    soft: ["var(--rs-success-soft)", "#1c7a4a"],
    solid: ["var(--rs-success)", "#fff"]
  },
  warning: {
    soft: ["var(--rs-warning-soft)", "#8a5f10"],
    solid: ["var(--rs-warning)", "#fff"]
  },
  danger: {
    soft: ["var(--rs-danger-soft)", "#a93529"],
    solid: ["var(--rs-danger)", "#fff"]
  }
};
function Badge({
  children,
  tone = "neutral",
  variant = "soft",
  dot = false,
  className = "",
  style = {},
  ...rest
}) {
  const t = TONES[tone] || TONES.neutral;
  const [bg, fg] = t[variant] || t.soft;
  return /*#__PURE__*/React.createElement("span", _extends({
    className: className,
    style: {
      display: "inline-flex",
      alignItems: "center",
      gap: 6,
      padding: "3px 10px",
      borderRadius: "var(--radius-pill)",
      background: bg,
      color: fg,
      fontFamily: "var(--font-body)",
      fontSize: "var(--text-xs)",
      fontWeight: "var(--weight-semibold)",
      letterSpacing: "0.01em",
      lineHeight: 1.4,
      whiteSpace: "nowrap",
      ...style
    }
  }, rest), dot && /*#__PURE__*/React.createElement("span", {
    style: {
      width: 6,
      height: 6,
      borderRadius: "50%",
      background: "currentColor"
    }
  }), children);
}
Object.assign(__ds_scope, { Badge });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data/Badge.jsx", error: String((e && e.message) || e) }); }

// components/data/Card.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Card — surface container. Sub-parts: Card.Header, Card.Body, Card.Footer.
 * Elevation via `elevation` prop; optional accent bar on the left.
 */
const ELEV = {
  flat: {
    boxShadow: "none",
    border: "1px solid var(--border-subtle)"
  },
  sm: {
    boxShadow: "var(--shadow-sm)",
    border: "1px solid var(--border-subtle)"
  },
  md: {
    boxShadow: "var(--shadow-md)",
    border: "1px solid var(--border-subtle)"
  },
  lg: {
    boxShadow: "var(--shadow-lg)",
    border: "1px solid transparent"
  }
};
function Card({
  children,
  elevation = "sm",
  interactive = false,
  accent = false,
  padded = false,
  className = "",
  style = {},
  ...rest
}) {
  const e = ELEV[elevation] || ELEV.sm;
  const [hover, setHover] = React.useState(false);
  return /*#__PURE__*/React.createElement("div", _extends({
    className: className,
    onMouseEnter: () => interactive && setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      position: "relative",
      background: "var(--surface-card)",
      borderRadius: "var(--radius-lg)",
      boxShadow: interactive && hover ? "var(--shadow-lg)" : e.boxShadow,
      border: e.border,
      overflow: "hidden",
      fontFamily: "var(--font-body)",
      color: "var(--text-body)",
      transform: interactive && hover ? "translateY(-2px)" : "none",
      transition: "transform var(--duration-normal) var(--ease-out), box-shadow var(--duration-normal) var(--ease-out)",
      cursor: interactive ? "pointer" : "default",
      padding: padded ? "var(--space-6)" : 0,
      ...style
    }
  }, rest), accent && /*#__PURE__*/React.createElement("span", {
    style: {
      position: "absolute",
      left: 0,
      top: 0,
      bottom: 0,
      width: 4,
      background: "var(--rs-gradient-brand)"
    }
  }), children);
}
Card.Header = function CardHeader({
  children,
  style = {},
  ...rest
}) {
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      padding: "var(--space-5) var(--space-6)",
      borderBottom: "1px solid var(--border-subtle)",
      ...style
    }
  }, rest), children);
};
Card.Body = function CardBody({
  children,
  style = {},
  ...rest
}) {
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      padding: "var(--space-6)",
      ...style
    }
  }, rest), children);
};
Card.Footer = function CardFooter({
  children,
  style = {},
  ...rest
}) {
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      padding: "var(--space-4) var(--space-6)",
      borderTop: "1px solid var(--border-subtle)",
      background: "var(--surface-subtle)",
      ...style
    }
  }, rest), children);
};
Object.assign(__ds_scope, { Card });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data/Card.jsx", error: String((e && e.message) || e) }); }

// components/data/Tag.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Tag — removable filter / keyword chip. Optional onRemove shows an ✕.
 */
function Tag({
  children,
  onRemove,
  interactive = false,
  selected = false,
  className = "",
  style = {},
  ...rest
}) {
  const [hover, setHover] = React.useState(false);
  const base = selected ? {
    bg: "var(--color-primary)",
    fg: "#fff",
    bd: "var(--color-primary)"
  } : {
    bg: hover && interactive ? "var(--surface-muted)" : "var(--surface-card)",
    fg: "var(--text-body)",
    bd: "var(--border-default)"
  };
  return /*#__PURE__*/React.createElement("span", _extends({
    className: className,
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      display: "inline-flex",
      alignItems: "center",
      gap: 6,
      padding: onRemove ? "4px 6px 4px 12px" : "4px 12px",
      borderRadius: "var(--radius-pill)",
      background: base.bg,
      color: base.fg,
      border: `1px solid ${base.bd}`,
      fontFamily: "var(--font-body)",
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      lineHeight: 1.4,
      cursor: interactive ? "pointer" : "default",
      whiteSpace: "nowrap",
      transition: "background var(--duration-fast), border-color var(--duration-fast)",
      ...style
    }
  }, rest), children, onRemove && /*#__PURE__*/React.createElement("button", {
    type: "button",
    onClick: e => {
      e.stopPropagation();
      onRemove(e);
    },
    "aria-label": "Remove",
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 18,
      height: 18,
      padding: 0,
      border: "none",
      borderRadius: "50%",
      background: "transparent",
      color: "inherit",
      cursor: "pointer",
      opacity: 0.7
    }
  }, /*#__PURE__*/React.createElement("svg", {
    width: "12",
    height: "12",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2.5",
    strokeLinecap: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18 6 6 18M6 6l12 12"
  }))));
}
Object.assign(__ds_scope, { Tag });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data/Tag.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Dialog.jsx
try { (() => {
/**
 * Dialog — modal overlay. Controlled via `open` / `onClose`.
 * Renders a scrim + centered panel. Sub-content passed as children;
 * `title`, `description`, and `footer` are convenience slots.
 */
function Dialog({
  open,
  onClose,
  title,
  description,
  footer,
  size = "md",
  showClose = true,
  children,
  style = {}
}) {
  React.useEffect(() => {
    if (!open) return;
    const onKey = e => {
      if (e.key === "Escape" && onClose) onClose();
    };
    window.addEventListener("keydown", onKey);
    return () => window.removeEventListener("keydown", onKey);
  }, [open, onClose]);
  if (!open) return null;
  const widths = {
    sm: 400,
    md: 520,
    lg: 680
  };
  return /*#__PURE__*/React.createElement("div", {
    onMouseDown: e => {
      if (e.target === e.currentTarget && onClose) onClose();
    },
    style: {
      position: "fixed",
      inset: 0,
      zIndex: 1000,
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      padding: "var(--space-6)",
      background: "rgba(16,24,33,.52)",
      backdropFilter: "blur(2px)",
      animation: "rs-fade var(--duration-normal) var(--ease-standard)",
      fontFamily: "var(--font-body)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    role: "dialog",
    "aria-modal": "true",
    style: {
      width: "100%",
      maxWidth: widths[size] || widths.md,
      maxHeight: "90vh",
      overflow: "auto",
      background: "var(--surface-card)",
      borderRadius: "var(--radius-xl)",
      boxShadow: "var(--shadow-xl)",
      animation: "rs-pop var(--duration-normal) var(--ease-out)",
      ...style
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      padding: "var(--space-6) var(--space-6) 0",
      display: "flex",
      alignItems: "flex-start",
      justifyContent: "space-between",
      gap: 16
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 4
    }
  }, title && /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-lg)",
      color: "var(--text-heading)",
      letterSpacing: "0.01em"
    }
  }, title), description && /*#__PURE__*/React.createElement("p", {
    style: {
      margin: 0,
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)",
      lineHeight: 1.5
    }
  }, description)), showClose && /*#__PURE__*/React.createElement("button", {
    type: "button",
    onClick: onClose,
    "aria-label": "Close",
    style: {
      flex: "0 0 auto",
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 32,
      height: 32,
      border: "none",
      borderRadius: "var(--radius-md)",
      background: "var(--surface-muted)",
      color: "var(--text-muted)",
      cursor: "pointer"
    }
  }, /*#__PURE__*/React.createElement("svg", {
    width: "16",
    height: "16",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2.2",
    strokeLinecap: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18 6 6 18M6 6l12 12"
  })))), children != null && /*#__PURE__*/React.createElement("div", {
    style: {
      padding: "var(--space-5) var(--space-6)",
      color: "var(--text-body)",
      fontSize: "var(--text-base)",
      lineHeight: 1.55
    }
  }, children), footer && /*#__PURE__*/React.createElement("div", {
    style: {
      padding: "var(--space-4) var(--space-6) var(--space-6)",
      display: "flex",
      justifyContent: "flex-end",
      gap: "var(--space-3)"
    }
  }, footer)), /*#__PURE__*/React.createElement("style", null, "@keyframes rs-fade{from{opacity:0}to{opacity:1}}@keyframes rs-pop{from{opacity:0;transform:translateY(10px) scale(.98)}to{opacity:1;transform:none}}"));
}
Object.assign(__ds_scope, { Dialog });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Dialog.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Toast.jsx
try { (() => {
/**
 * Toast — transient notification. Render inline, or stack in a fixed corner.
 * Self-contained visual (no provider); pass `onClose` to show a dismiss ✕.
 */
const TONES = {
  info: {
    icon: "info",
    color: "var(--color-primary)",
    bg: "var(--rs-info-soft)"
  },
  success: {
    icon: "check-circle-2",
    color: "var(--rs-success)",
    bg: "var(--rs-success-soft)"
  },
  warning: {
    icon: "alert-triangle",
    color: "var(--rs-warning)",
    bg: "var(--rs-warning-soft)"
  },
  danger: {
    icon: "alert-octagon",
    color: "var(--rs-danger)",
    bg: "var(--rs-danger-soft)"
  }
};
const GLYPH = {
  "info": "M12 16v-4M12 8h.01",
  "check-circle-2": "M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20ZM9 12l2 2 4-4",
  "alert-triangle": "M12 9v4M12 17h.01M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z",
  "alert-octagon": "M12 8v4M12 16h.01M7.9 2.8h8.2L21.2 8v8.2l-5.1 5.1H7.9L2.8 16.1V7.9L7.9 2.8Z"
};
function Toast({
  title,
  children,
  tone = "info",
  onClose,
  className = "",
  style = {}
}) {
  const t = TONES[tone] || TONES.info;
  return /*#__PURE__*/React.createElement("div", {
    className: className,
    role: "status",
    style: {
      display: "flex",
      gap: 12,
      alignItems: "flex-start",
      width: "100%",
      maxWidth: 400,
      padding: "var(--space-4)",
      background: "var(--surface-card)",
      border: "1px solid var(--border-subtle)",
      borderLeft: `3px solid ${t.color}`,
      borderRadius: "var(--radius-md)",
      boxShadow: "var(--shadow-lg)",
      fontFamily: "var(--font-body)",
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      flex: "0 0 auto",
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 28,
      height: 28,
      borderRadius: "var(--radius-sm)",
      background: t.bg,
      color: t.color
    }
  }, /*#__PURE__*/React.createElement("svg", {
    width: "17",
    height: "17",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: GLYPH[t.icon]
  }))), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      minWidth: 0,
      display: "flex",
      flexDirection: "column",
      gap: 2
    }
  }, title && /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-semibold)",
      color: "var(--text-heading)"
    }
  }, title), children && /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)",
      lineHeight: 1.45
    }
  }, children)), onClose && /*#__PURE__*/React.createElement("button", {
    type: "button",
    onClick: onClose,
    "aria-label": "Dismiss",
    style: {
      flex: "0 0 auto",
      display: "inline-flex",
      width: 24,
      height: 24,
      alignItems: "center",
      justifyContent: "center",
      border: "none",
      background: "transparent",
      color: "var(--text-subtle)",
      cursor: "pointer",
      borderRadius: "var(--radius-sm)"
    }
  }, /*#__PURE__*/React.createElement("svg", {
    width: "14",
    height: "14",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2.2",
    strokeLinecap: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M18 6 6 18M6 6l12 12"
  }))));
}
Object.assign(__ds_scope, { Toast });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Toast.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Tooltip.jsx
try { (() => {
/**
 * Tooltip — hover/focus label. Wraps a single child trigger.
 */
function Tooltip({
  label,
  placement = "top",
  children,
  style = {}
}) {
  const [open, setOpen] = React.useState(false);
  const pos = {
    top: {
      bottom: "calc(100% + 8px)",
      left: "50%",
      transform: "translateX(-50%)"
    },
    bottom: {
      top: "calc(100% + 8px)",
      left: "50%",
      transform: "translateX(-50%)"
    },
    left: {
      right: "calc(100% + 8px)",
      top: "50%",
      transform: "translateY(-50%)"
    },
    right: {
      left: "calc(100% + 8px)",
      top: "50%",
      transform: "translateY(-50%)"
    }
  }[placement] || {};
  return /*#__PURE__*/React.createElement("span", {
    style: {
      position: "relative",
      display: "inline-flex"
    },
    onMouseEnter: () => setOpen(true),
    onMouseLeave: () => setOpen(false),
    onFocus: () => setOpen(true),
    onBlur: () => setOpen(false)
  }, children, open && /*#__PURE__*/React.createElement("span", {
    role: "tooltip",
    style: {
      position: "absolute",
      ...pos,
      zIndex: 900,
      whiteSpace: "nowrap",
      padding: "6px 10px",
      borderRadius: "var(--radius-sm)",
      background: "var(--rs-neutral-900)",
      color: "#fff",
      fontFamily: "var(--font-body)",
      fontSize: "var(--text-xs)",
      fontWeight: "var(--weight-medium)",
      boxShadow: "var(--shadow-md)",
      pointerEvents: "none",
      animation: "rs-tt var(--duration-fast) var(--ease-out)",
      ...style
    }
  }, label, /*#__PURE__*/React.createElement("style", null, "@keyframes rs-tt{from{opacity:0;transform:translate(var(--tx,0),4px)}to{opacity:1}}")));
}
Object.assign(__ds_scope, { Tooltip });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Tooltip.jsx", error: String((e && e.message) || e) }); }

// components/forms/Checkbox.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Checkbox — brand checkbox with label. Controlled or uncontrolled.
 */
function Checkbox({
  label,
  description,
  checked,
  defaultChecked,
  disabled = false,
  onChange,
  id,
  className = "",
  style = {},
  ...rest
}) {
  const rid = id || React.useId();
  const isControlled = checked !== undefined;
  const [internal, setInternal] = React.useState(!!defaultChecked);
  const on = isControlled ? checked : internal;
  const toggle = e => {
    if (disabled) return;
    if (!isControlled) setInternal(e.target.checked);
    onChange && onChange(e);
  };
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: rid,
    className: className,
    style: {
      display: "flex",
      gap: 10,
      alignItems: description ? "flex-start" : "center",
      cursor: disabled ? "not-allowed" : "pointer",
      opacity: disabled ? 0.55 : 1,
      fontFamily: "var(--font-body)",
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      position: "relative",
      flex: "0 0 auto",
      width: 20,
      height: 20,
      marginTop: description ? 2 : 0
    }
  }, /*#__PURE__*/React.createElement("input", _extends({
    type: "checkbox",
    id: rid,
    checked: on,
    disabled: disabled,
    onChange: toggle
  }, rest, {
    style: {
      position: "absolute",
      opacity: 0,
      width: "100%",
      height: "100%",
      margin: 0,
      cursor: "inherit"
    }
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      width: 20,
      height: 20,
      borderRadius: "var(--radius-xs)",
      border: `1.5px solid ${on ? "var(--color-primary)" : "var(--border-strong)"}`,
      background: on ? "var(--color-primary)" : "var(--surface-card)",
      transition: "background var(--duration-fast), border-color var(--duration-fast)"
    }
  }, on && /*#__PURE__*/React.createElement("svg", {
    width: "13",
    height: "13",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "#fff",
    strokeWidth: "3.2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: "M20 6 9 17l-5-5"
  })))), (label || description) && /*#__PURE__*/React.createElement("span", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 2
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      color: "var(--text-heading)",
      lineHeight: 1.35
    }
  }, label), description && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--text-muted)",
      lineHeight: 1.4
    }
  }, description)));
}
Object.assign(__ds_scope, { Checkbox });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Checkbox.jsx", error: String((e && e.message) || e) }); }

// components/forms/Input.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Input — single-line text field. Supports label, hint, error, icons, sizes.
 */
const SIZES = {
  sm: {
    height: 36,
    fontSize: "var(--text-sm)",
    padding: "0 var(--space-3)"
  },
  md: {
    height: 44,
    fontSize: "var(--text-base)",
    padding: "0 var(--space-4)"
  },
  lg: {
    height: 52,
    fontSize: "var(--text-md)",
    padding: "0 var(--space-5)"
  }
};
function Input({
  label,
  hint,
  error,
  size = "md",
  leftIcon = null,
  rightIcon = null,
  disabled = false,
  id,
  className = "",
  style = {},
  ...rest
}) {
  const s = SIZES[size] || SIZES.md;
  const [focused, setFocused] = React.useState(false);
  const rid = id || React.useId();
  const borderColor = error ? "var(--rs-danger)" : focused ? "var(--border-focus)" : "var(--border-default)";
  return /*#__PURE__*/React.createElement("div", {
    className: className,
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 6,
      fontFamily: "var(--font-body)",
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("label", {
    htmlFor: rid,
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      color: "var(--text-heading)"
    }
  }, label), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      alignItems: "center",
      gap: 8,
      height: s.height,
      padding: s.padding,
      background: disabled ? "var(--surface-muted)" : "var(--surface-card)",
      border: `1px solid ${borderColor}`,
      borderRadius: "var(--radius-md)",
      boxShadow: focused ? error ? "0 0 0 3px rgba(217,75,63,.28)" : "var(--ring-focus)" : "none",
      transition: "border-color var(--duration-fast), box-shadow var(--duration-fast)",
      opacity: disabled ? 0.6 : 1
    }
  }, leftIcon && /*#__PURE__*/React.createElement("span", {
    style: {
      color: "var(--text-muted)",
      display: "inline-flex"
    }
  }, leftIcon), /*#__PURE__*/React.createElement("input", _extends({
    id: rid,
    disabled: disabled,
    onFocus: e => {
      setFocused(true);
      rest.onFocus && rest.onFocus(e);
    },
    onBlur: e => {
      setFocused(false);
      rest.onBlur && rest.onBlur(e);
    }
  }, rest, {
    style: {
      flex: 1,
      minWidth: 0,
      border: "none",
      outline: "none",
      background: "transparent",
      fontFamily: "inherit",
      fontSize: s.fontSize,
      color: "var(--text-heading)",
      height: "100%"
    }
  })), rightIcon && /*#__PURE__*/React.createElement("span", {
    style: {
      color: "var(--text-muted)",
      display: "inline-flex"
    }
  }, rightIcon)), (hint || error) && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-xs)",
      color: error ? "var(--rs-danger)" : "var(--text-muted)"
    }
  }, error || hint));
}
Object.assign(__ds_scope, { Input });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Input.jsx", error: String((e && e.message) || e) }); }

// components/forms/RadioGroup.jsx
try { (() => {
/**
 * RadioGroup — a set of mutually-exclusive options.
 */
function RadioGroup({
  label,
  options = [],
  value,
  defaultValue,
  onChange,
  name,
  disabled = false,
  className = "",
  style = {}
}) {
  const gname = name || React.useId();
  const isControlled = value !== undefined;
  const [internal, setInternal] = React.useState(defaultValue);
  const current = isControlled ? value : internal;
  const pick = v => {
    if (disabled) return;
    if (!isControlled) setInternal(v);
    onChange && onChange(v);
  };
  return /*#__PURE__*/React.createElement("div", {
    className: className,
    role: "radiogroup",
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 10,
      fontFamily: "var(--font-body)",
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      color: "var(--text-heading)"
    }
  }, label), options.map(o => {
    const val = typeof o === "string" ? o : o.value;
    const lab = typeof o === "string" ? o : o.label;
    const on = current === val;
    return /*#__PURE__*/React.createElement("label", {
      key: val,
      style: {
        display: "flex",
        gap: 10,
        alignItems: "center",
        cursor: disabled ? "not-allowed" : "pointer",
        opacity: disabled ? 0.55 : 1
      }
    }, /*#__PURE__*/React.createElement("span", {
      style: {
        position: "relative",
        width: 20,
        height: 20,
        flex: "0 0 auto"
      }
    }, /*#__PURE__*/React.createElement("input", {
      type: "radio",
      name: gname,
      value: val,
      checked: on,
      disabled: disabled,
      onChange: () => pick(val),
      style: {
        position: "absolute",
        opacity: 0,
        width: "100%",
        height: "100%",
        margin: 0,
        cursor: "inherit"
      }
    }), /*#__PURE__*/React.createElement("span", {
      style: {
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
        width: 20,
        height: 20,
        borderRadius: "50%",
        border: `1.5px solid ${on ? "var(--color-primary)" : "var(--border-strong)"}`,
        background: "var(--surface-card)",
        transition: "border-color var(--duration-fast)"
      }
    }, on && /*#__PURE__*/React.createElement("span", {
      style: {
        width: 10,
        height: 10,
        borderRadius: "50%",
        background: "var(--color-primary)"
      }
    }))), /*#__PURE__*/React.createElement("span", {
      style: {
        fontSize: "var(--text-sm)",
        color: "var(--text-heading)"
      }
    }, lab));
  }));
}
Object.assign(__ds_scope, { RadioGroup });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/RadioGroup.jsx", error: String((e && e.message) || e) }); }

// components/forms/Select.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Select — styled native dropdown with brand chrome.
 */
const SIZES = {
  sm: {
    height: 36,
    fontSize: "var(--text-sm)",
    padding: "0 var(--space-8) 0 var(--space-3)"
  },
  md: {
    height: 44,
    fontSize: "var(--text-base)",
    padding: "0 var(--space-10) 0 var(--space-4)"
  },
  lg: {
    height: 52,
    fontSize: "var(--text-md)",
    padding: "0 var(--space-10) 0 var(--space-5)"
  }
};
function Select({
  label,
  hint,
  error,
  size = "md",
  disabled = false,
  placeholder,
  options = [],
  id,
  className = "",
  style = {},
  children,
  ...rest
}) {
  const s = SIZES[size] || SIZES.md;
  const [focused, setFocused] = React.useState(false);
  const rid = id || React.useId();
  const borderColor = error ? "var(--rs-danger)" : focused ? "var(--border-focus)" : "var(--border-default)";
  return /*#__PURE__*/React.createElement("div", {
    className: className,
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 6,
      fontFamily: "var(--font-body)",
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("label", {
    htmlFor: rid,
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      color: "var(--text-heading)"
    }
  }, label), /*#__PURE__*/React.createElement("div", {
    style: {
      position: "relative",
      opacity: disabled ? 0.6 : 1
    }
  }, /*#__PURE__*/React.createElement("select", _extends({
    id: rid,
    disabled: disabled,
    onFocus: () => setFocused(true),
    onBlur: () => setFocused(false)
  }, rest, {
    style: {
      appearance: "none",
      WebkitAppearance: "none",
      width: "100%",
      height: s.height,
      padding: s.padding,
      fontFamily: "inherit",
      fontSize: s.fontSize,
      color: "var(--text-heading)",
      background: disabled ? "var(--surface-muted)" : "var(--surface-card)",
      border: `1px solid ${borderColor}`,
      borderRadius: "var(--radius-md)",
      outline: "none",
      boxShadow: focused ? error ? "0 0 0 3px rgba(217,75,63,.28)" : "var(--ring-focus)" : "none",
      transition: "border-color var(--duration-fast), box-shadow var(--duration-fast)",
      cursor: disabled ? "not-allowed" : "pointer"
    }
  }), placeholder && /*#__PURE__*/React.createElement("option", {
    value: "",
    disabled: true,
    hidden: true
  }, placeholder), options.map(o => {
    const val = typeof o === "string" ? o : o.value;
    const lab = typeof o === "string" ? o : o.label;
    return /*#__PURE__*/React.createElement("option", {
      key: val,
      value: val
    }, lab);
  }), children), /*#__PURE__*/React.createElement("span", {
    style: {
      position: "absolute",
      right: 14,
      top: "50%",
      transform: "translateY(-50%)",
      pointerEvents: "none",
      color: "var(--text-muted)",
      display: "inline-flex"
    }
  }, /*#__PURE__*/React.createElement("svg", {
    width: "16",
    height: "16",
    viewBox: "0 0 24 24",
    fill: "none",
    stroke: "currentColor",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }, /*#__PURE__*/React.createElement("path", {
    d: "m6 9 6 6 6-6"
  })))), (hint || error) && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-xs)",
      color: error ? "var(--rs-danger)" : "var(--text-muted)"
    }
  }, error || hint));
}
Object.assign(__ds_scope, { Select });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Select.jsx", error: String((e && e.message) || e) }); }

// components/forms/Switch.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Switch — on/off toggle for settings and instant preferences.
 */
const SIZES = {
  sm: {
    w: 36,
    h: 20,
    k: 14
  },
  md: {
    w: 44,
    h: 24,
    k: 18
  }
};
function Switch({
  label,
  checked,
  defaultChecked,
  disabled = false,
  size = "md",
  onChange,
  id,
  className = "",
  style = {},
  ...rest
}) {
  const s = SIZES[size] || SIZES.md;
  const rid = id || React.useId();
  const isControlled = checked !== undefined;
  const [internal, setInternal] = React.useState(!!defaultChecked);
  const on = isControlled ? checked : internal;
  const toggle = e => {
    if (disabled) return;
    if (!isControlled) setInternal(e.target.checked);
    onChange && onChange(e);
  };
  const pad = (s.h - s.k) / 2;
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: rid,
    className: className,
    style: {
      display: "inline-flex",
      gap: 10,
      alignItems: "center",
      cursor: disabled ? "not-allowed" : "pointer",
      opacity: disabled ? 0.55 : 1,
      fontFamily: "var(--font-body)",
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      position: "relative",
      width: s.w,
      height: s.h,
      flex: "0 0 auto"
    }
  }, /*#__PURE__*/React.createElement("input", _extends({
    type: "checkbox",
    id: rid,
    checked: on,
    disabled: disabled,
    onChange: toggle
  }, rest, {
    style: {
      position: "absolute",
      opacity: 0,
      width: "100%",
      height: "100%",
      margin: 0,
      cursor: "inherit"
    }
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      display: "block",
      width: s.w,
      height: s.h,
      borderRadius: "var(--radius-pill)",
      background: on ? "var(--color-primary)" : "var(--rs-neutral-300)",
      transition: "background var(--duration-normal) var(--ease-standard)"
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      position: "absolute",
      top: pad,
      left: on ? s.w - s.k - pad : pad,
      width: s.k,
      height: s.k,
      borderRadius: "50%",
      background: "#fff",
      boxShadow: "var(--shadow-sm)",
      transition: "left var(--duration-normal) var(--ease-out)"
    }
  })), label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      fontWeight: "var(--weight-medium)",
      color: "var(--text-heading)"
    }
  }, label));
}
Object.assign(__ds_scope, { Switch });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Switch.jsx", error: String((e && e.message) || e) }); }

// components/navigation/Tabs.jsx
try { (() => {
/**
 * Tabs — horizontal tab navigation. Controlled or uncontrolled.
 * underline (default) or pill style.
 */
function Tabs({
  tabs = [],
  value,
  defaultValue,
  onChange,
  variant = "underline",
  className = "",
  style = {}
}) {
  const isControlled = value !== undefined;
  const first = tabs[0] && (typeof tabs[0] === "string" ? tabs[0] : tabs[0].value);
  const [internal, setInternal] = React.useState(defaultValue ?? first);
  const current = isControlled ? value : internal;
  const pick = v => {
    if (!isControlled) setInternal(v);
    onChange && onChange(v);
  };
  const pill = variant === "pill";
  return /*#__PURE__*/React.createElement("div", {
    className: className,
    role: "tablist",
    style: {
      display: "inline-flex",
      gap: pill ? 4 : 4,
      padding: pill ? 4 : 0,
      background: pill ? "var(--surface-muted)" : "transparent",
      borderRadius: pill ? "var(--radius-md)" : 0,
      borderBottom: pill ? "none" : "1px solid var(--border-subtle)",
      fontFamily: "var(--font-body)",
      ...style
    }
  }, tabs.map(t => {
    const val = typeof t === "string" ? t : t.value;
    const lab = typeof t === "string" ? t : t.label;
    const badge = typeof t === "object" ? t.badge : null;
    const on = current === val;
    return /*#__PURE__*/React.createElement("button", {
      key: val,
      type: "button",
      role: "tab",
      "aria-selected": on,
      onClick: () => pick(val),
      style: {
        display: "inline-flex",
        alignItems: "center",
        gap: 8,
        padding: pill ? "7px 16px" : "10px 14px",
        border: "none",
        cursor: "pointer",
        background: pill ? on ? "var(--surface-card)" : "transparent" : "transparent",
        boxShadow: pill && on ? "var(--shadow-sm)" : "none",
        borderRadius: pill ? "var(--radius-sm)" : 0,
        borderBottom: pill ? "none" : `2px solid ${on ? "var(--color-primary)" : "transparent"}`,
        marginBottom: pill ? 0 : -1,
        color: on ? pill ? "var(--text-heading)" : "var(--color-primary)" : "var(--text-muted)",
        fontSize: "var(--text-sm)",
        fontWeight: on ? "var(--weight-semibold)" : "var(--weight-medium)",
        transition: "color var(--duration-fast), background var(--duration-fast)",
        whiteSpace: "nowrap"
      }
    }, lab, badge != null && /*#__PURE__*/React.createElement("span", {
      style: {
        padding: "1px 7px",
        borderRadius: "var(--radius-pill)",
        background: on ? "var(--color-primary-subtle)" : "var(--surface-muted)",
        color: on ? "var(--rs-blue-700)" : "var(--text-muted)",
        fontSize: "var(--text-2xs)",
        fontWeight: "var(--weight-semibold)"
      }
    }, badge));
  }));
}
Object.assign(__ds_scope, { Tabs });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/navigation/Tabs.jsx", error: String((e && e.message) || e) }); }

// ui_kits/portal/Portal.jsx
try { (() => {
// B2B Portal — shell (sidebar + topbar) and screens.
const DS_PORTAL = window.RasheeEnterprisesDesignSystem_cf8188;
const ORDERS = [{
  id: "RS-4821",
  customer: "Acme Industrial",
  items: 12,
  total: "$4,280",
  status: ["Shipped", "success"],
  date: "Jul 24"
}, {
  id: "RS-4820",
  customer: "Northwind Mfg",
  items: 4,
  total: "$960",
  status: ["Processing", "primary"],
  date: "Jul 24"
}, {
  id: "RS-4818",
  customer: "Konstruct Ltd",
  items: 30,
  total: "$12,540",
  status: ["Open", "warning"],
  date: "Jul 23"
}, {
  id: "RS-4815",
  customer: "Pinnacle Retail",
  items: 8,
  total: "$1,720",
  status: ["Shipped", "success"],
  date: "Jul 23"
}, {
  id: "RS-4812",
  customer: "Vertex Logistics",
  items: 2,
  total: "$410",
  status: ["Cancelled", "danger"],
  date: "Jul 22"
}, {
  id: "RS-4809",
  customer: "Summit Trading",
  items: 16,
  total: "$6,050",
  status: ["Processing", "primary"],
  date: "Jul 22"
}, {
  id: "RS-4805",
  customer: "Delta Components",
  items: 6,
  total: "$1,180",
  status: ["Open", "warning"],
  date: "Jul 21"
}];
function Sidebar({
  route,
  onNav
}) {
  const {
    Logo,
    Icon
  } = DS_PORTAL;
  const nav = [["Dashboard", "layout-dashboard"], ["Orders", "shopping-cart"], ["Products", "package"], ["Customers", "users"], ["Invoices", "file-text"], ["Settings", "settings"]];
  return /*#__PURE__*/React.createElement("aside", {
    style: {
      width: 236,
      flex: "0 0 auto",
      background: "var(--surface-inverse)",
      display: "flex",
      flexDirection: "column",
      padding: "20px 14px",
      gap: 6
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      padding: "6px 10px 18px"
    }
  }, /*#__PURE__*/React.createElement(Logo, {
    variant: "full",
    tone: "white",
    height: 34
  })), nav.map(([label, icon]) => {
    const on = route === label;
    return /*#__PURE__*/React.createElement("button", {
      key: label,
      onClick: () => onNav(label),
      style: {
        display: "flex",
        alignItems: "center",
        gap: 12,
        padding: "10px 12px",
        border: "none",
        cursor: "pointer",
        borderRadius: "var(--radius-md)",
        background: on ? "var(--color-primary)" : "transparent",
        color: on ? "#fff" : "var(--rs-neutral-400)",
        fontFamily: "var(--font-body)",
        fontSize: "var(--text-sm)",
        fontWeight: on ? 600 : 500,
        textAlign: "left",
        transition: "background var(--duration-fast)"
      }
    }, /*#__PURE__*/React.createElement(Icon, {
      name: icon,
      size: 18
    }), label);
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: "auto",
      padding: 12,
      borderRadius: "var(--radius-lg)",
      background: "var(--surface-inverse-soft)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--rs-neutral-400)",
      marginBottom: 8
    }
  }, "Need help sourcing?"), /*#__PURE__*/React.createElement("button", {
    style: {
      width: "100%",
      padding: "8px",
      border: "none",
      borderRadius: "var(--radius-sm)",
      background: "var(--rs-gold-600)",
      color: "#fff",
      fontFamily: "var(--font-body)",
      fontWeight: 600,
      fontSize: "var(--text-xs)",
      cursor: "pointer"
    }
  }, "Contact your rep")));
}
function Topbar({
  title
}) {
  const {
    Input,
    IconButton,
    Icon
  } = DS_PORTAL;
  return /*#__PURE__*/React.createElement("div", {
    style: {
      height: 68,
      flex: "0 0 auto",
      borderBottom: "1px solid var(--border-subtle)",
      background: "var(--surface-card)",
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      padding: "0 28px",
      gap: 20
    }
  }, /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-xl)",
      color: "var(--text-heading)"
    }
  }, title), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      alignItems: "center",
      gap: 12
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 240
    }
  }, /*#__PURE__*/React.createElement(Input, {
    size: "sm",
    placeholder: "Search orders, SKUs\u2026",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "search",
      size: 16
    })
  })), /*#__PURE__*/React.createElement(IconButton, {
    variant: "ghost",
    "aria-label": "Notifications"
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "bell",
    size: 19
  })), /*#__PURE__*/React.createElement(IconButton, {
    variant: "ghost",
    "aria-label": "Help"
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "circle-help",
    size: 19
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 38,
      height: 38,
      borderRadius: "50%",
      background: "var(--rs-gradient-blue)",
      color: "#fff",
      fontFamily: "var(--font-display)",
      fontWeight: 600
    }
  }, "JR")));
}
function StatCard({
  icon,
  label,
  value,
  delta,
  up
}) {
  const {
    Card,
    Icon
  } = DS_PORTAL;
  return /*#__PURE__*/React.createElement(Card, {
    elevation: "sm",
    padded: true
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      justifyContent: "space-between",
      alignItems: "flex-start"
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 44,
      height: 44,
      borderRadius: "var(--radius-md)",
      background: "var(--color-primary-subtle)",
      color: "var(--color-primary)"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: icon,
    size: 22
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      gap: 3,
      fontSize: "var(--text-xs)",
      fontWeight: 600,
      color: up ? "var(--rs-success)" : "var(--rs-danger)"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: up ? "trending-up" : "trending-down",
    size: 14
  }), delta)), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)",
      color: "var(--text-heading)",
      marginTop: 16,
      lineHeight: 1
    }
  }, value), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)",
      marginTop: 6
    }
  }, label));
}
function OrderTable({
  rows
}) {
  const {
    Badge,
    IconButton,
    Icon
  } = DS_PORTAL;
  const th = {
    textAlign: "left",
    padding: "12px 16px",
    fontSize: "var(--text-xs)",
    textTransform: "uppercase",
    letterSpacing: ".06em",
    color: "var(--text-muted)",
    fontWeight: 600,
    borderBottom: "1px solid var(--border-subtle)"
  };
  const td = {
    padding: "14px 16px",
    fontSize: "var(--text-sm)",
    color: "var(--text-body)",
    borderBottom: "1px solid var(--border-subtle)"
  };
  return /*#__PURE__*/React.createElement("div", {
    style: {
      overflow: "hidden",
      borderRadius: "var(--radius-lg)",
      border: "1px solid var(--border-subtle)",
      background: "var(--surface-card)"
    }
  }, /*#__PURE__*/React.createElement("table", {
    style: {
      width: "100%",
      borderCollapse: "collapse",
      fontFamily: "var(--font-body)"
    }
  }, /*#__PURE__*/React.createElement("thead", null, /*#__PURE__*/React.createElement("tr", null, /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Order"), /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Customer"), /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Items"), /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Total"), /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Status"), /*#__PURE__*/React.createElement("th", {
    style: th
  }, "Date"), /*#__PURE__*/React.createElement("th", {
    style: {
      ...th,
      width: 48
    }
  }))), /*#__PURE__*/React.createElement("tbody", null, rows.map(o => /*#__PURE__*/React.createElement("tr", {
    key: o.id
  }, /*#__PURE__*/React.createElement("td", {
    style: {
      ...td,
      fontWeight: 600,
      color: "var(--text-heading)"
    }
  }, o.id), /*#__PURE__*/React.createElement("td", {
    style: td
  }, o.customer), /*#__PURE__*/React.createElement("td", {
    style: td
  }, o.items), /*#__PURE__*/React.createElement("td", {
    style: {
      ...td,
      fontWeight: 600,
      color: "var(--text-heading)"
    }
  }, o.total), /*#__PURE__*/React.createElement("td", {
    style: td
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: o.status[1],
    dot: true
  }, o.status[0])), /*#__PURE__*/React.createElement("td", {
    style: {
      ...td,
      color: "var(--text-muted)"
    }
  }, o.date), /*#__PURE__*/React.createElement("td", {
    style: td
  }, /*#__PURE__*/React.createElement(IconButton, {
    size: "sm",
    variant: "ghost",
    "aria-label": "Row actions"
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "more-horizontal",
    size: 16
  }))))))));
}
function DashboardScreen() {
  const {
    Card,
    Button,
    Icon,
    Badge
  } = DS_PORTAL;
  return /*#__PURE__*/React.createElement("div", {
    style: {
      padding: 28,
      display: "flex",
      flexDirection: "column",
      gap: 22
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "grid",
      gridTemplateColumns: "repeat(4,1fr)",
      gap: 20
    }
  }, /*#__PURE__*/React.createElement(StatCard, {
    icon: "dollar-sign",
    label: "Revenue (MTD)",
    value: "$284K",
    delta: "12.4%",
    up: true
  }), /*#__PURE__*/React.createElement(StatCard, {
    icon: "shopping-cart",
    label: "Open orders",
    value: "38",
    delta: "3.1%",
    up: true
  }), /*#__PURE__*/React.createElement(StatCard, {
    icon: "package",
    label: "SKUs in stock",
    value: "1,942",
    delta: "0.8%",
    up: true
  }), /*#__PURE__*/React.createElement(StatCard, {
    icon: "clock",
    label: "Avg. fulfilment",
    value: "1.8d",
    delta: "0.3d",
    up: false
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "grid",
      gridTemplateColumns: "1.7fr 1fr",
      gap: 22,
      alignItems: "start"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 14
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      justifyContent: "space-between",
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-lg)",
      color: "var(--text-heading)"
    }
  }, "Recent orders"), /*#__PURE__*/React.createElement(Button, {
    variant: "ghost",
    size: "sm",
    rightIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "arrow-right",
      size: 16
    })
  }, "View all")), /*#__PURE__*/React.createElement(OrderTable, {
    rows: ORDERS.slice(0, 5)
  })), /*#__PURE__*/React.createElement(Card, {
    elevation: "sm",
    padded: true
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: "0 0 16px",
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-lg)",
      color: "var(--text-heading)"
    }
  }, "Activity"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 16
    }
  }, [["check-circle-2", "success", "Order RS-4821 shipped", "10m ago"], ["file-text", "primary", "Quote sent to Konstruct Ltd", "42m ago"], ["package", "gold", "Restocked Hex Bolts M8", "2h ago"], ["user-plus", "primary", "New customer: Delta Components", "5h ago"]].map(([ic, tone, txt, t], i) => /*#__PURE__*/React.createElement("div", {
    key: i,
    style: {
      display: "flex",
      gap: 12,
      alignItems: "flex-start"
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 32,
      height: 32,
      borderRadius: "var(--radius-md)",
      background: "var(--surface-muted)",
      color: "var(--color-primary)",
      flex: "0 0 auto"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: ic,
    size: 16
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-heading)",
      lineHeight: 1.4
    }
  }, txt), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--text-muted)",
      marginTop: 2
    }
  }, t))))))));
}
function OrdersScreen() {
  const {
    Tabs,
    Button,
    Icon,
    Tag
  } = DS_PORTAL;
  const [tab, setTab] = React.useState("All");
  const map = {
    All: null,
    Open: "Open",
    Processing: "Processing",
    Shipped: "Shipped"
  };
  const rows = ORDERS.filter(o => !map[tab] || o.status[0] === map[tab]);
  return /*#__PURE__*/React.createElement("div", {
    style: {
      padding: 28,
      display: "flex",
      flexDirection: "column",
      gap: 20
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      justifyContent: "space-between",
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement(Tabs, {
    tabs: [{
      value: "All",
      label: "All",
      badge: ORDERS.length
    }, {
      value: "Open",
      label: "Open"
    }, {
      value: "Processing",
      label: "Processing"
    }, {
      value: "Shipped",
      label: "Shipped"
    }],
    value: tab,
    onChange: setTab
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      gap: 10
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "outline",
    size: "sm",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "filter",
      size: 16
    })
  }, "Filter"), /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "sm",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "plus",
      size: 16
    })
  }, "New order"))), /*#__PURE__*/React.createElement(OrderTable, {
    rows: rows
  }));
}
function PortalApp() {
  const [route, setRoute] = React.useState("Dashboard");
  return /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      height: "100vh",
      overflow: "hidden",
      fontFamily: "var(--font-body)",
      background: "var(--surface-subtle)"
    }
  }, /*#__PURE__*/React.createElement(Sidebar, {
    route: route,
    onNav: setRoute
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      display: "flex",
      flexDirection: "column",
      minWidth: 0
    }
  }, /*#__PURE__*/React.createElement(Topbar, {
    title: route
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      overflow: "auto"
    }
  }, route === "Orders" ? /*#__PURE__*/React.createElement(OrdersScreen, null) : /*#__PURE__*/React.createElement(DashboardScreen, null))));
}
Object.assign(window, {
  PortalApp
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/portal/Portal.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/Chrome.jsx
try { (() => {
// Marketing site — shared header + footer. Uses DS components off the global namespace.
const DS = window.RasheeEnterprisesDesignSystem_cf8188;
function SiteHeader({
  current,
  onNav
}) {
  const {
    Logo,
    Button,
    Icon
  } = DS;
  const links = ["Home", "Products", "Solutions", "About", "Contact"];
  return /*#__PURE__*/React.createElement("header", {
    style: {
      position: "sticky",
      top: 0,
      zIndex: 50,
      background: "rgba(255,255,255,.86)",
      backdropFilter: "blur(10px)",
      borderBottom: "1px solid var(--border-subtle)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "0 32px",
      height: 72,
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      gap: 24
    }
  }, /*#__PURE__*/React.createElement("button", {
    onClick: () => onNav("Home"),
    style: {
      border: "none",
      background: "none",
      cursor: "pointer",
      padding: 0,
      display: "flex"
    }
  }, /*#__PURE__*/React.createElement(Logo, {
    variant: "full",
    tone: "color",
    height: 40
  })), /*#__PURE__*/React.createElement("nav", {
    style: {
      display: "flex",
      gap: 4,
      alignItems: "center"
    }
  }, links.map(l => /*#__PURE__*/React.createElement("button", {
    key: l,
    onClick: () => onNav(l),
    style: {
      border: "none",
      background: current === l ? "var(--color-primary-subtle)" : "transparent",
      cursor: "pointer",
      padding: "8px 14px",
      borderRadius: "var(--radius-md)",
      fontFamily: "var(--font-body)",
      fontSize: "var(--text-sm)",
      fontWeight: 600,
      color: current === l ? "var(--rs-blue-700)" : "var(--text-body)",
      transition: "background var(--duration-fast)"
    }
  }, l))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      gap: 10,
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "ghost",
    size: "sm",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "search",
      size: 18
    })
  }, "Search"), /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "sm",
    rightIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "arrow-up-right",
      size: 16
    })
  }, "Request a quote"))));
}
function SiteFooter({
  onNav
}) {
  const {
    Logo,
    Icon
  } = DS;
  const cols = [{
    h: "Products",
    items: ["Industrial Supplies", "CNC & Fabrication", "Packaging", "Bulk Materials"]
  }, {
    h: "Company",
    items: ["About Us", "Careers", "Newsroom", "Sustainability"]
  }, {
    h: "Support",
    items: ["Contact", "Request a Quote", "Shipping", "Returns"]
  }];
  return /*#__PURE__*/React.createElement("footer", {
    style: {
      background: "var(--surface-inverse)",
      color: "var(--rs-neutral-300)",
      fontFamily: "var(--font-body)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "56px 32px 32px",
      display: "grid",
      gridTemplateColumns: "1.4fr 1fr 1fr 1fr",
      gap: 40
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement(Logo, {
    variant: "full",
    tone: "white",
    height: 40
  }), /*#__PURE__*/React.createElement("p", {
    style: {
      marginTop: 16,
      fontSize: "var(--text-sm)",
      lineHeight: 1.6,
      maxWidth: 260,
      color: "var(--rs-neutral-400)"
    }
  }, "Empowering your business, one solution at a time. Manufacturing & trading for B2B and online sales."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      gap: 10,
      marginTop: 18
    }
  }, ["linkedin", "twitter", "facebook", "instagram"].map(s => /*#__PURE__*/React.createElement("span", {
    key: s,
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 34,
      height: 34,
      borderRadius: "var(--radius-md)",
      background: "var(--surface-inverse-soft)",
      color: "var(--rs-neutral-300)"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: s,
    size: 16
  }))))), cols.map(c => /*#__PURE__*/React.createElement("div", {
    key: c.h
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".12em",
      fontSize: "var(--text-xs)",
      color: "#fff",
      fontWeight: 600,
      marginBottom: 14
    }
  }, c.h), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 10
    }
  }, c.items.map(it => /*#__PURE__*/React.createElement("button", {
    key: it,
    onClick: () => onNav("Products"),
    style: {
      border: "none",
      background: "none",
      textAlign: "left",
      padding: 0,
      cursor: "pointer",
      color: "var(--rs-neutral-400)",
      fontSize: "var(--text-sm)",
      fontFamily: "inherit"
    }
  }, it)))))), /*#__PURE__*/React.createElement("div", {
    style: {
      borderTop: "1px solid var(--surface-inverse-soft)",
      padding: "18px 32px",
      maxWidth: 1200,
      margin: "0 auto",
      display: "flex",
      justifyContent: "space-between",
      fontSize: "var(--text-xs)",
      color: "var(--rs-neutral-500)"
    }
  }, /*#__PURE__*/React.createElement("span", null, "\xA9 2026 Rashee Enterprises. All rights reserved."), /*#__PURE__*/React.createElement("span", null, "Privacy \xB7 Terms \xB7 Cookies")));
}
Object.assign(window, {
  SiteHeader,
  SiteFooter
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/Chrome.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/HomePage.jsx
try { (() => {
// Marketing site — Home page.
const DS_H = window.RasheeEnterprisesDesignSystem_cf8188;
function HomePage({
  onNav,
  dsBase
}) {
  const {
    Button,
    Card,
    Badge,
    Icon
  } = DS_H;
  const img = f => dsBase + "assets/imagery/" + f;
  const values = [{
    icon: "shield-check",
    title: "Integrity",
    body: "We hold ourselves to the highest standards in every transaction and partnership."
  }, {
    icon: "check-circle-2",
    title: "Reliability",
    body: "Consistent quality and on-time delivery your operations can depend on."
  }, {
    icon: "lightbulb",
    title: "Innovation",
    body: "Dynamic strategies and modern tooling that move your business forward."
  }];
  const products = [{
    name: "Industrial Fasteners",
    tag: "Manufacturing",
    badge: ["In stock", "success"],
    icon: "bolt"
  }, {
    name: "CNC Machined Parts",
    tag: "Fabrication",
    badge: ["Featured", "gold"],
    icon: "cog"
  }, {
    name: "Bulk Raw Materials",
    tag: "Trading",
    badge: ["In stock", "success"],
    icon: "package"
  }, {
    name: "Custom Packaging",
    tag: "Online",
    badge: ["Low stock", "warning"],
    icon: "box"
  }];
  return /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-body)",
      color: "var(--text-body)"
    }
  }, /*#__PURE__*/React.createElement("section", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "72px 32px 40px",
      display: "grid",
      gridTemplateColumns: "1.05fr .95fr",
      gap: 56,
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".14em",
      fontWeight: 600,
      fontSize: "var(--text-sm)",
      color: "var(--color-primary)",
      marginBottom: 18
    }
  }, "Manufacturing & Trading"), /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-4xl)",
      lineHeight: 1.02,
      letterSpacing: "-.01em",
      color: "var(--text-heading)"
    }
  }, "Empowering your business, one solution at a time"), /*#__PURE__*/React.createElement("p", {
    style: {
      marginTop: 22,
      fontSize: "var(--text-md)",
      lineHeight: 1.6,
      maxWidth: 480,
      color: "var(--text-body)"
    }
  }, "Rashee Enterprises delivers quality products and services for B2B and online sales \u2014 built on integrity, reliability, and innovation."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      gap: 14,
      marginTop: 30
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "lg",
    rightIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "arrow-up-right",
      size: 20
    }),
    onClick: () => onNav("Products")
  }, "Explore products"), /*#__PURE__*/React.createElement(Button, {
    variant: "outline",
    size: "lg",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "phone",
      size: 18
    }),
    onClick: () => onNav("Contact")
  }, "Talk to sales")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      gap: 32,
      marginTop: 44
    }
  }, [["25+", "Years in business"], ["1,200+", "B2B partners"], ["98%", "On-time delivery"]].map(([n, l]) => /*#__PURE__*/React.createElement("div", {
    key: l
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)",
      color: "var(--text-heading)",
      lineHeight: 1
    }
  }, n), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)",
      marginTop: 6
    }
  }, l))))), /*#__PURE__*/React.createElement("div", {
    style: {
      position: "relative",
      height: 460
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: "absolute",
      inset: 0,
      borderRadius: "var(--radius-2xl)",
      overflow: "hidden",
      boxShadow: "var(--shadow-xl)"
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: img("tower-portrait.jpg"),
    alt: "Rashee facility",
    style: {
      width: "100%",
      height: "100%",
      objectFit: "cover"
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: "absolute",
      inset: 0,
      background: "linear-gradient(160deg,rgba(65,169,220,.12),rgba(28,91,124,.42))"
    }
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      position: "absolute",
      left: -22,
      bottom: 34,
      background: "var(--surface-card)",
      borderRadius: "var(--radius-lg)",
      boxShadow: "var(--shadow-lg)",
      padding: "16px 20px",
      display: "flex",
      alignItems: "center",
      gap: 12
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 40,
      height: 40,
      borderRadius: "var(--radius-md)",
      background: "var(--rs-success-soft)",
      color: "var(--rs-success)"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "badge-check",
    size: 22
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontWeight: 700,
      color: "var(--text-heading)",
      fontSize: "var(--text-sm)"
    }
  }, "ISO 9001 Certified"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--text-muted)"
    }
  }, "Quality you can trust"))))), /*#__PURE__*/React.createElement("section", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "48px 32px"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "grid",
      gridTemplateColumns: "repeat(3,1fr)",
      gap: 22
    }
  }, values.map(v => /*#__PURE__*/React.createElement(Card, {
    key: v.title,
    elevation: "sm",
    padded: true,
    interactive: true
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: "inline-flex",
      alignItems: "center",
      justifyContent: "center",
      width: 52,
      height: 52,
      borderRadius: "var(--radius-lg)",
      background: "var(--color-primary-subtle)",
      color: "var(--color-primary)",
      marginBottom: 16
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: v.icon,
    size: 26
  })), /*#__PURE__*/React.createElement("h3", {
    style: {
      margin: "0 0 8px",
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-lg)",
      color: "var(--text-heading)"
    }
  }, v.title), /*#__PURE__*/React.createElement("p", {
    style: {
      margin: 0,
      fontSize: "var(--text-sm)",
      lineHeight: 1.6,
      color: "var(--text-muted)"
    }
  }, v.body))))), /*#__PURE__*/React.createElement("section", {
    style: {
      background: "var(--surface-subtle)",
      borderTop: "1px solid var(--border-subtle)",
      borderBottom: "1px solid var(--border-subtle)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "64px 32px"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      justifyContent: "space-between",
      alignItems: "flex-end",
      marginBottom: 30
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".14em",
      fontWeight: 600,
      fontSize: "var(--text-sm)",
      color: "var(--rs-gold-600)",
      marginBottom: 10
    }
  }, "What we offer"), /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)",
      color: "var(--text-heading)"
    }
  }, "Featured products")), /*#__PURE__*/React.createElement(Button, {
    variant: "ghost",
    rightIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "arrow-right",
      size: 18
    }),
    onClick: () => onNav("Products")
  }, "View catalog")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "grid",
      gridTemplateColumns: "repeat(4,1fr)",
      gap: 20
    }
  }, products.map(p => /*#__PURE__*/React.createElement(Card, {
    key: p.name,
    elevation: "sm",
    interactive: true,
    onClick: () => onNav("Products")
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      height: 120,
      background: "var(--rs-gradient-blue)",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      color: "#fff"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: p.icon,
    size: 40
  })), /*#__PURE__*/React.createElement(Card.Body, null, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 8
    }
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: p.badge[1],
    dot: true
  }, p.badge[0])), /*#__PURE__*/React.createElement("div", {
    style: {
      fontWeight: 700,
      color: "var(--text-heading)",
      fontSize: "var(--text-base)",
      marginBottom: 4
    }
  }, p.name), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)"
    }
  }, p.tag))))))), /*#__PURE__*/React.createElement("section", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "72px 32px",
      display: "grid",
      gridTemplateColumns: ".95fr 1.05fr",
      gap: 56,
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: "relative",
      height: 380,
      borderRadius: "var(--radius-2xl)",
      overflow: "hidden",
      boxShadow: "var(--shadow-lg)"
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: img("tower-a.jpg"),
    alt: "",
    style: {
      width: "100%",
      height: "100%",
      objectFit: "cover"
    }
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".14em",
      fontWeight: 600,
      fontSize: "var(--text-sm)",
      color: "var(--color-primary)",
      marginBottom: 14
    }
  }, "About us"), /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: "0 0 18px",
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)",
      lineHeight: 1.08,
      color: "var(--text-heading)"
    }
  }, "At the forefront of manufacturing and trading"), /*#__PURE__*/React.createElement("p", {
    style: {
      margin: "0 0 16px",
      fontSize: "var(--text-base)",
      lineHeight: 1.7
    }
  }, "Our commitment is to deliver quality products and services that exceed customer expectations. With a dynamic approach and innovative strategies, we strive to be a leader in our industry."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 12,
      marginTop: 8
    }
  }, ["Top-notch manufacturing and trading solutions", "A recognised leader in B2B and online sales", "Fostering growth and success for our partners"].map(t => /*#__PURE__*/React.createElement("div", {
    key: t,
    style: {
      display: "flex",
      gap: 10,
      alignItems: "center"
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: "var(--rs-success)",
      display: "inline-flex"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "check-circle-2",
    size: 20
  })), /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-body)"
    }
  }, t)))))), /*#__PURE__*/React.createElement("section", {
    style: {
      background: "var(--rs-gradient-blue)",
      color: "#fff"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "56px 32px",
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      gap: 32
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h2", {
    style: {
      margin: "0 0 8px",
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)"
    }
  }, "Ready to source with confidence?"), /*#__PURE__*/React.createElement("p", {
    style: {
      margin: 0,
      fontSize: "var(--text-md)",
      color: "rgba(255,255,255,.9)"
    }
  }, "Get a tailored quote from our team within one business day.")), /*#__PURE__*/React.createElement(Button, {
    variant: "accent",
    size: "lg",
    rightIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "arrow-up-right",
      size: 20
    }),
    onClick: () => onNav("Contact")
  }, "Request a quote"))));
}
Object.assign(window, {
  HomePage
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/HomePage.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/ProductsPage.jsx
try { (() => {
// Marketing site — Products catalog with live filtering + add-to-quote.
const DS_P = window.RasheeEnterprisesDesignSystem_cf8188;
const CATALOG = [{
  name: "Hex Bolts M8",
  cat: "Fasteners",
  price: "$0.12",
  stock: ["In stock", "success"],
  icon: "bolt"
}, {
  name: "CNC Bracket A2",
  cat: "Fabrication",
  price: "$4.80",
  stock: ["Featured", "gold"],
  icon: "cog"
}, {
  name: "Aluminium Sheet",
  cat: "Raw Materials",
  price: "$32.00",
  stock: ["In stock", "success"],
  icon: "layers"
}, {
  name: "Corrugated Box L",
  cat: "Packaging",
  price: "$0.65",
  stock: ["Low stock", "warning"],
  icon: "box"
}, {
  name: "Stainless Rods",
  cat: "Raw Materials",
  price: "$18.40",
  stock: ["In stock", "success"],
  icon: "minus"
}, {
  name: "Precision Gears",
  cat: "Fabrication",
  price: "$12.20",
  stock: ["In stock", "success"],
  icon: "settings"
}, {
  name: "Nylon Washers",
  cat: "Fasteners",
  price: "$0.04",
  stock: ["In stock", "success"],
  icon: "circle"
}, {
  name: "Pallet Wrap 500m",
  cat: "Packaging",
  price: "$9.90",
  stock: ["Backorder", "neutral"],
  icon: "package"
}, {
  name: "Copper Wire 2.5mm",
  cat: "Raw Materials",
  price: "$45.00",
  stock: ["Featured", "gold"],
  icon: "cable"
}];
const CATS = ["Fasteners", "Fabrication", "Raw Materials", "Packaging"];
function ProductsPage({
  dsBase
}) {
  const {
    Button,
    Card,
    Badge,
    Tag,
    Select,
    Checkbox,
    Input,
    Icon,
    Dialog,
    Toast
  } = DS_P;
  const [active, setActive] = React.useState([]);
  const [sort, setSort] = React.useState("Popularity");
  const [query, setQuery] = React.useState("");
  const [quote, setQuote] = React.useState([]);
  const [toast, setToast] = React.useState(null);
  const [dialog, setDialog] = React.useState(false);
  const toggle = c => setActive(a => a.includes(c) ? a.filter(x => x !== c) : [...a, c]);
  let items = CATALOG.filter(p => (active.length === 0 || active.includes(p.cat)) && p.name.toLowerCase().includes(query.toLowerCase()));
  if (sort === "Price") items = [...items].sort((a, b) => parseFloat(a.price.slice(1)) - parseFloat(b.price.slice(1)));
  if (sort === "Name") items = [...items].sort((a, b) => a.name.localeCompare(b.name));
  const add = p => {
    setQuote(q => q.includes(p.name) ? q : [...q, p.name]);
    setToast({
      tone: "success",
      title: "Added to quote",
      msg: `${p.name} added to your request.`
    });
    setTimeout(() => setToast(null), 2600);
  };
  return /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-body)",
      color: "var(--text-body)",
      position: "relative"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      background: "var(--surface-subtle)",
      borderBottom: "1px solid var(--border-subtle)"
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "48px 32px",
      display: "flex",
      justifyContent: "space-between",
      alignItems: "flex-end",
      gap: 24
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".14em",
      fontWeight: 600,
      fontSize: "var(--text-sm)",
      color: "var(--color-primary)",
      marginBottom: 10
    }
  }, "Catalog"), /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: 0,
      fontFamily: "var(--font-display)",
      fontWeight: 700,
      fontSize: "var(--text-2xl)",
      color: "var(--text-heading)"
    }
  }, "Products & Materials")), /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "file-text",
      size: 18
    }),
    onClick: () => setDialog(true)
  }, "My quote (", quote.length, ")"))), /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "36px 32px 72px",
      display: "grid",
      gridTemplateColumns: "240px 1fr",
      gap: 36,
      alignItems: "start"
    }
  }, /*#__PURE__*/React.createElement("aside", {
    style: {
      position: "sticky",
      top: 88,
      display: "flex",
      flexDirection: "column",
      gap: 24
    }
  }, /*#__PURE__*/React.createElement(Input, {
    placeholder: "Search products\u2026",
    leftIcon: /*#__PURE__*/React.createElement(Icon, {
      name: "search",
      size: 18
    }),
    value: query,
    onChange: e => setQuery(e.target.value)
  }), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: "var(--font-display)",
      textTransform: "uppercase",
      letterSpacing: ".1em",
      fontSize: "var(--text-xs)",
      fontWeight: 600,
      color: "var(--text-muted)",
      marginBottom: 12
    }
  }, "Category"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 12
    }
  }, CATS.map(c => /*#__PURE__*/React.createElement(Checkbox, {
    key: c,
    label: c,
    checked: active.includes(c),
    onChange: () => toggle(c)
  })))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement(Select, {
    label: "Sort by",
    options: ["Popularity", "Price", "Name"],
    value: sort,
    onChange: e => setSort(e.target.value)
  }))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      alignItems: "center",
      gap: 8,
      marginBottom: 18,
      flexWrap: "wrap"
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-muted)",
      marginRight: 4
    }
  }, items.length, " products"), active.map(c => /*#__PURE__*/React.createElement(Tag, {
    key: c,
    onRemove: () => toggle(c)
  }, c)), active.length > 0 && /*#__PURE__*/React.createElement("button", {
    onClick: () => setActive([]),
    style: {
      border: "none",
      background: "none",
      color: "var(--text-link)",
      fontFamily: "var(--font-body)",
      fontSize: "var(--text-sm)",
      fontWeight: 600,
      cursor: "pointer"
    }
  }, "Clear all")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "grid",
      gridTemplateColumns: "repeat(3,1fr)",
      gap: 20
    }
  }, items.map(p => /*#__PURE__*/React.createElement(Card, {
    key: p.name,
    elevation: "sm",
    interactive: true
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      height: 108,
      background: "var(--surface-muted)",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      color: "var(--color-primary)"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: p.icon,
    size: 38
  })), /*#__PURE__*/React.createElement(Card.Body, null, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 8
    }
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: p.stock[1],
    dot: true
  }, p.stock[0])), /*#__PURE__*/React.createElement("div", {
    style: {
      fontWeight: 700,
      color: "var(--text-heading)",
      fontSize: "var(--text-base)"
    }
  }, p.name), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--text-muted)",
      marginTop: 3
    }
  }, p.cat), /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      marginTop: 14
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: "var(--font-display)",
      fontWeight: 600,
      fontSize: "var(--text-lg)",
      color: "var(--text-heading)"
    }
  }, p.price, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-xs)",
      color: "var(--text-muted)",
      fontWeight: 400
    }
  }, " /unit")), /*#__PURE__*/React.createElement(Button, {
    size: "sm",
    variant: quote.includes(p.name) ? "outline" : "primary",
    onClick: () => add(p)
  }, quote.includes(p.name) ? "Added" : "Add")))))))), /*#__PURE__*/React.createElement(Dialog, {
    open: dialog,
    onClose: () => setDialog(false),
    title: "Your quote request",
    description: quote.length ? `${quote.length} item(s) ready to send.` : "Add products to build a quote.",
    footer: /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(Button, {
      variant: "ghost",
      onClick: () => setDialog(false)
    }, "Keep browsing"), /*#__PURE__*/React.createElement(Button, {
      onClick: () => {
        setDialog(false);
        setToast({
          tone: "success",
          title: "Quote sent",
          msg: "We'll respond within one business day."
        });
        setTimeout(() => setToast(null), 2600);
      },
      disabled: !quote.length
    }, "Send request"))
  }, quote.length ? /*#__PURE__*/React.createElement("div", {
    style: {
      display: "flex",
      flexDirection: "column",
      gap: 8
    }
  }, quote.map(n => /*#__PURE__*/React.createElement("div", {
    key: n,
    style: {
      display: "flex",
      justifyContent: "space-between",
      alignItems: "center",
      padding: "8px 0",
      borderBottom: "1px solid var(--border-subtle)"
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: "var(--text-sm)",
      color: "var(--text-heading)"
    }
  }, n), /*#__PURE__*/React.createElement("button", {
    onClick: () => setQuote(q => q.filter(x => x !== n)),
    style: {
      border: "none",
      background: "none",
      color: "var(--text-muted)",
      cursor: "pointer",
      display: "inline-flex"
    }
  }, /*#__PURE__*/React.createElement(Icon, {
    name: "x",
    size: 16
  }))))) : /*#__PURE__*/React.createElement("span", {
    style: {
      color: "var(--text-muted)",
      fontSize: "var(--text-sm)"
    }
  }, "No items yet.")), toast && /*#__PURE__*/React.createElement("div", {
    style: {
      position: "fixed",
      right: 24,
      bottom: 24,
      zIndex: 1100
    }
  }, /*#__PURE__*/React.createElement(Toast, {
    tone: toast.tone,
    title: toast.title,
    onClose: () => setToast(null)
  }, toast.msg)));
}
Object.assign(window, {
  ProductsPage
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/ProductsPage.jsx", error: String((e && e.message) || e) }); }

__ds_ns.Icon = __ds_scope.Icon;

__ds_ns.Logo = __ds_scope.Logo;

__ds_ns.Button = __ds_scope.Button;

__ds_ns.IconButton = __ds_scope.IconButton;

__ds_ns.Badge = __ds_scope.Badge;

__ds_ns.Card = __ds_scope.Card;

__ds_ns.Tag = __ds_scope.Tag;

__ds_ns.Dialog = __ds_scope.Dialog;

__ds_ns.Toast = __ds_scope.Toast;

__ds_ns.Tooltip = __ds_scope.Tooltip;

__ds_ns.Checkbox = __ds_scope.Checkbox;

__ds_ns.Input = __ds_scope.Input;

__ds_ns.RadioGroup = __ds_scope.RadioGroup;

__ds_ns.Select = __ds_scope.Select;

__ds_ns.Switch = __ds_scope.Switch;

__ds_ns.Tabs = __ds_scope.Tabs;

})();
