

var AntiReact = {
    scriptJS: (id, url) => {

        var script = document.createElement('script');
        //script.async = true;
        script.src = url;
        script.id = id;
        script.async = true;
        script.type = "text/javascript";

        return script;
        //document.body.appendChild(script);
    }
}

export default AntiReact;