/**
 * This is my try to fix React shit
 */

var AntiReact = {

    /**
     * builds JS script tag and can append it to body
     *
     * @param id
     * @param url
     * @param onload
     * @param append
     * @returns {Element}
     */
    scriptJS: (id, url, onload, append = true) => {
        var script = document.createElement('script');
        script.src = url;
        script.id = id;
        script.async = true;
        script.type = "text/javascript";

        if(onload) {
            script.onload = onload;
        }

        if (append) {
            document.body.appendChild(script);
        }

        return script;
    }
}

export default AntiReact;