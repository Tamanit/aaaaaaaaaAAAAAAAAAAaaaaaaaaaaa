import { createInertiaApp } from '@inertiajs/react'
import { createRoot } from 'react-dom/client'

import "/resources/css/global.css"
import "/resources/vendor/nucleo/css/nucleo.css";
import "/resources/vendor/font-awesome/css/font-awesome.min.css";
import "/resources/css/argon-design-system-react.css";
// import "/resources/css/argon-design-system-react.min.css";
// import "/resources/css/argon-design-system-react.css.map";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true })
        return pages[`./Pages/${name}.jsx`]
    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />)
    },
})
