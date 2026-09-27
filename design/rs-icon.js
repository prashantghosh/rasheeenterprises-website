// RsIcon — React-owned icon component with a LOCAL icon set.
//
// Two reasons this exists instead of the design system's Icon:
// 1. The DS Icon renders <i data-lucide> and calls an unscoped lucide.createIcons(),
//    which replaces the DOM node React holds a ref to (breaks reconciliation, and the
//    glyph never updates when the name prop changes).
// 2. No CDN. The paths below are drawn to match the Lucide set this project designs
//    against, at 24x24 with a 2px stroke, so published/offline bundles work with no
//    network access.
(function () {
  // Each entry: array of [tag, attrs] children of a 24x24 stroke icon.
  var I = {
    check: [["path", { d: "M20 6 9 17l-5-5" }]],
    x: [["path", { d: "M18 6 6 18" }], ["path", { d: "m6 6 12 12" }]],
    "arrow-right": [["path", { d: "M5 12h14" }], ["path", { d: "m12 5 7 7-7 7" }]],
    "chevron-down": [["path", { d: "m6 9 6 6 6-6" }]],
    "chevron-up": [["path", { d: "m18 15-6-6-6 6" }]],
    menu: [["path", { d: "M4 5h16" }], ["path", { d: "M4 12h16" }], ["path", { d: "M4 19h16" }]],
    search: [["circle", { cx: "11", cy: "11", r: "8" }], ["path", { d: "m21 21-4.3-4.3" }]],
    mail: [
      ["rect", { x: "2", y: "4", width: "20", height: "16", rx: "2" }],
      ["path", { d: "m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" }]
    ],
    phone: [["path", { d: "M13.83 16.57a1 1 0 0 0 1.21-.3l.36-.47A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.47.35a1 1 0 0 0-.29 1.24 14 14 0 0 0 6.39 6.38" }]],
    "map-pin": [
      ["path", { d: "M20 10c0 4.99-5.54 10.19-7.4 11.8a1 1 0 0 1-1.2 0C9.54 20.19 4 14.99 4 10a8 8 0 0 1 16 0" }],
      ["circle", { cx: "12", cy: "10", r: "3" }]
    ],
    leaf: [
      ["path", { d: "M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" }],
      ["path", { d: "M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12" }]
    ],
    "external-link": [
      ["path", { d: "M15 3h6v6" }],
      ["path", { d: "M10 14 21 3" }],
      ["path", { d: "M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" }]
    ],
    "message-circle": [["path", { d: "M7.9 20A9 9 0 1 0 4 16.1L2 22Z" }]],
    ruler: [
      ["path", { d: "M21.3 8.7 8.7 21.3a1 1 0 0 1-1.4 0l-4.6-4.6a1 1 0 0 1 0-1.4L15.3 2.7a1 1 0 0 1 1.4 0l4.6 4.6a1 1 0 0 1 0 1.4Z" }],
      ["path", { d: "m7.5 10.5 2 2" }], ["path", { d: "m10.5 7.5 2 2" }],
      ["path", { d: "m13.5 4.5 2 2" }], ["path", { d: "m4.5 13.5 2 2" }]
    ],
    stamp: [
      ["path", { d: "M5 22h14" }],
      ["path", { d: "M19.27 13.73A2.5 2.5 0 0 0 17.5 13h-11A2.5 2.5 0 0 0 4 15.5V17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-1.5c0-.66-.26-1.3-.73-1.77Z" }],
      ["path", { d: "M14 13V8.5C14 7 15 7 15 5a3 3 0 0 0-3-3c-1.66 0-3 1-3 3s1 2 1 3.5V13" }]
    ],
    package: [
      ["path", { d: "m7.5 4.27 9 5.15" }],
      ["path", { d: "M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" }],
      ["path", { d: "m3.3 7 8.7 5 8.7-5" }],
      ["path", { d: "M12 22V12" }]
    ],
    droplets: [
      ["path", { d: "M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 4.8 7 2.75c-.29 2.05-1.14 3.38-2.29 4.31S3 10.1 3 11.25c0 2.22 1.8 4.05 4 4.05Z" }],
      ["path", { d: "M12.56 6.6A11 11 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a7 7 0 0 1-11.91 4.97" }]
    ],
    truck: [
      ["path", { d: "M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" }],
      ["path", { d: "M15 18H9" }],
      ["path", { d: "M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14" }],
      ["circle", { cx: "17", cy: "18", r: "2" }],
      ["circle", { cx: "7", cy: "18", r: "2" }]
    ],
    "indian-rupee": [
      ["path", { d: "M6 3h12" }], ["path", { d: "M6 8h12" }],
      ["path", { d: "m6 13 8.5 8" }], ["path", { d: "M6 13h3" }],
      ["path", { d: "M9 13c6.67 0 6.67-10 0-10" }]
    ],
    snowflake: [
      ["path", { d: "M2 12h20" }], ["path", { d: "M12 2v20" }],
      ["path", { d: "m4.93 4.93 14.14 14.14" }], ["path", { d: "m19.07 4.93-14.14 14.14" }],
      ["path", { d: "m8 6 4 2 4-2" }], ["path", { d: "m8 18 4-2 4 2" }]
    ],
    "shopping-basket": [
      ["path", { d: "m5 11 4-7" }], ["path", { d: "m19 11-4-7" }],
      ["path", { d: "M2 11h20" }],
      ["path", { d: "m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.6-7.4" }],
      ["path", { d: "m9 11 1 9" }], ["path", { d: "M4.5 15.5h15" }], ["path", { d: "m15 11-1 9" }]
    ],
    shirt: [["path", { d: "M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23Z" }]],
    wrench: [["path", { d: "M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z" }]],
    pill: [
      ["path", { d: "m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z" }],
      ["path", { d: "m8.5 8.5 7 7" }]
    ],
    factory: [
      ["path", { d: "M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" }],
      ["path", { d: "M17 18h1" }], ["path", { d: "M12 18h1" }], ["path", { d: "M7 18h1" }]
    ],
    "sliders-horizontal": [
      ["path", { d: "M10 5H3" }], ["path", { d: "M12 19H3" }],
      ["path", { d: "M14 3v4" }], ["path", { d: "M16 17v4" }],
      ["path", { d: "M21 12h-9" }], ["path", { d: "M21 19h-5" }],
      ["path", { d: "M21 5h-7" }], ["path", { d: "M8 10v4" }], ["path", { d: "M8 12H3" }]
    ],
    "arrow-up-down": [
      ["path", { d: "m21 16-4 4-4-4" }], ["path", { d: "M17 20V4" }],
      ["path", { d: "m3 8 4-4 4 4" }], ["path", { d: "M7 4v16" }]
    ],
    "loader-circle": [["path", { d: "M21 12a9 9 0 1 1-6.22-8.56" }]],
    "file-text": [
      ["path", { d: "M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" }],
      ["path", { d: "M14 2v4a2 2 0 0 0 2 2h4" }],
      ["path", { d: "M10 9H8" }], ["path", { d: "M16 13H8" }], ["path", { d: "M16 17H8" }]
    ],
    scale: [
      ["path", { d: "m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z" }],
      ["path", { d: "m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z" }],
      ["path", { d: "M7 21h10" }], ["path", { d: "M12 3v18" }],
      ["path", { d: "M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2" }]
    ],
    layers: [
      ["path", { d: "M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" }],
      ["path", { d: "m6.08 9.5-3.5 1.6a1 1 0 0 0 0 1.81l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9a1 1 0 0 0 0-1.83l-3.5-1.59" }],
      ["path", { d: "m6.08 14.5-3.5 1.6a1 1 0 0 0 0 1.81l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9a1 1 0 0 0 0-1.83l-3.5-1.59" }]
    ],
    thermometer: [["path", { d: "M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z" }]],
    palette: [
      ["path", { d: "M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.93 0 1.65-.75 1.65-1.69 0-.44-.18-.83-.44-1.12a1.6 1.6 0 0 1-.44-1.13 1.64 1.64 0 0 1 1.67-1.66h2c3.05 0 5.56-2.51 5.56-5.56C21.96 6.01 17.46 2 12 2Z" }],
      ["circle", { cx: "13.5", cy: "6.5", r: "1" }],
      ["circle", { cx: "17.5", cy: "10.5", r: "1" }],
      ["circle", { cx: "8.5", cy: "7.5", r: "1" }],
      ["circle", { cx: "6.5", cy: "12.5", r: "1" }]
    ],
    clock: [
      ["circle", { cx: "12", cy: "12", r: "10" }],
      ["path", { d: "M12 6v6l4 2" }]
    ],
    "alert-circle": [
      ["circle", { cx: "12", cy: "12", r: "10" }],
      ["path", { d: "M12 8v4" }], ["path", { d: "M12 16h.01" }]
    ]
  };

  var cache = {};

  function pascal(name) {
    return String(name || "").split(/[-_ ]+/).filter(Boolean)
      .map(function (p) { return p.charAt(0).toUpperCase() + p.slice(1); }).join("");
  }

  function serialize(children) {
    return children.map(function (child) {
      var tag = child[0], attrs = child[1] || {};
      var a = Object.keys(attrs).map(function (k) {
        return k + '="' + String(attrs[k]).replace(/"/g, "&quot;") + '"';
      }).join(" ");
      return "<" + tag + " " + a + "></" + tag + ">";
    }).join("");
  }

  function resolve(name) {
    if (name in cache) return cache[name];
    var children = I[name];
    if (!children && window.lucide && window.lucide.icons) {
      children = window.lucide.icons[pascal(name)] || window.lucide.icons[name];
    }
    cache[name] = children ? serialize(children) : "";
    if (!children && typeof console !== "undefined") {
      console.warn("[RsIcon] no glyph for '" + name + "' — add it to rs-icon.js");
    }
    return cache[name];
  }

  function RsIcon(props) {
    var size = props.size == null ? 20 : props.size;
    return React.createElement("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      width: size,
      height: size,
      viewBox: "0 0 24 24",
      fill: "none",
      stroke: "currentColor",
      strokeWidth: props.strokeWidth == null ? 2 : props.strokeWidth,
      strokeLinecap: "round",
      strokeLinejoin: "round",
      "aria-hidden": "true",
      focusable: "false",
      style: Object.assign({ display: "block", flex: "none" }, props.style || {}),
      dangerouslySetInnerHTML: { __html: resolve(props.name) }
    });
  }

  window.RsIcon = RsIcon;
})();
