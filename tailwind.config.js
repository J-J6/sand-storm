/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "tertiary":"#1e0700","surface-bright":"#f8f9fb","primary-container":"#1e242b",
                        "surface-container-high":"#e6e8ea","on-tertiary-fixed":"#351000","surface-dim":"#d8dadc",
                        "on-secondary":"#ffffff","primary":"#080e15","outline":"#75777b","secondary-fixed":"#cce5ff",
                        "tertiary-container":"#411600","secondary-fixed-dim":"#b0c9e2","primary-fixed":"#dde3ec",
                        "outline-variant":"#c5c6cb","tertiary-fixed-dim":"#ffb693","primary-fixed-dim":"#c1c7d0",
                        "on-background":"#191c1e","surface-tint":"#595f67","on-error":"#ffffff","error":"#ba1a1a",
                        "surface-container-lowest":"#ffffff","surface-variant":"#e0e3e5","on-primary-fixed-variant":"#41474f",
                        "on-secondary-container":"#4f677d","on-secondary-fixed":"#011d30","on-surface":"#191c1e",
                        "surface-container-highest":"#e0e3e5","secondary-container":"#cce5ff","on-tertiary-container":"#de6824",
                        "surface-container":"#eceef0","on-surface-variant":"#44474b","error-container":"#ffdad6",
                        "inverse-on-surface":"#eff1f3","on-secondary-fixed-variant":"#31495e","on-primary":"#ffffff",
                        "on-error-container":"#93000a","surface-container-low":"#f2f4f6","on-tertiary-fixed-variant":"#7a3000",
                        "secondary":"#496176","tertiary-fixed":"#ffdbcc","surface":"#f8f9fb","on-primary-container":"#858b94",
                        "on-tertiary":"#ffffff","on-primary-fixed":"#161c23","background":"#f8f9fb","inverse-primary":"#c1c7d0",
                        "inverse-surface":"#2d3133"
                    },
                    borderRadius: { "DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem" },
                    spacing: {
                        "space-xs":"0.25rem","space-md":"1rem","gutter-mobile":"0.75rem","space-lg":"1.5rem",
                        "margin-mobile":"1rem","margin":"3rem","gutter":"1.5rem","space-sm":"0.5rem","space-xl":"2.5rem"
                    },
                    fontFamily: {
                        "body-lg":["Inter","ui-sans-serif","system-ui","sans-serif"],"headline-xl-mobile":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],"display-lg-mobile":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],
                        "display-lg":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],"headline-sm":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],"body-sm":["Inter","ui-sans-serif","system-ui","sans-serif"],"body-md":["Inter","ui-sans-serif","system-ui","sans-serif"],
                        "headline-lg":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],"headline-xl":["Space Grotesk","ui-sans-serif","system-ui","sans-serif"],"label-technical":["JetBrains Mono","ui-monospace","SFMono-Regular","Menlo","monospace"],
                        "metric-display":["JetBrains Mono","ui-monospace","SFMono-Regular","Menlo","monospace"]
                    },
                    fontSize: {
                        "body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],
                        "headline-xl-mobile":["28px",{"lineHeight":"36px","letterSpacing":"-0.01em","fontWeight":"600"}],
                        "display-lg-mobile":["36px",{"lineHeight":"44px","letterSpacing":"-0.02em","fontWeight":"700"}],
                        "display-lg":["56px",{"lineHeight":"64px","letterSpacing":"-0.02em","fontWeight":"700"}],
                        "headline-sm":["20px",{"lineHeight":"28px","fontWeight":"600"}],
                        "body-sm":["13px",{"lineHeight":"20px","fontWeight":"400"}],
                        "body-md":["15px",{"lineHeight":"24px","fontWeight":"400"}],
                        "headline-lg":["32px",{"lineHeight":"40px","letterSpacing":"-0.01em","fontWeight":"600"}],
                        "headline-xl":["40px",{"lineHeight":"48px","letterSpacing":"-0.015em","fontWeight":"600"}],
                        "label-technical":["12px",{"lineHeight":"16px","letterSpacing":"0.06em","fontWeight":"500"}],
                        "metric-display":["28px",{"lineHeight":"32px","letterSpacing":"-0.02em","fontWeight":"700"}]
                    }
                }
            }
};
