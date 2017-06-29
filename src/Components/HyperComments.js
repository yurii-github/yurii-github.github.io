import React from 'react';

import AntiReact from './../Helpers/AntiReact.js'


export default class HyperComments extends React.Component {

    constructor(props) {
        super(props);
    }

    render () {
        return (<div><div id="hypercomments_widget"></div></div>);
    }

    componentDidMount() {
        console.log('componentDidMount')

        let _hcwp = window._hcwp || [];
        _hcwp.push({widget:"Stream", widget_id: 91700});

        if("HC_LOAD_INIT" in window) {
            return;
        }

        var HC_LOAD_INIT = true;
        var hcc, s;
        hcc = AntiReact.scriptJS("hypercomments_script", "https://w.hypercomments.com/widget/hc/91700/en/widget.js");
        s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hcc, s.nextSibling);

        //


        //console.log(this.instance);
      //  this.instance.append(s);
/*
        var _hcwp = window._hcwp || [];
        _hcwp.push({widget:"Stream", widget_id: 91700});
        //(function() {
            if("HC_LOAD_INIT" in window)return;
            var HC_LOAD_INIT = true;
            //var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
            var lang = 'en';
            var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
            hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/91700/"+lang+"/widget.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
        //})();

        */
    }
}