import React from 'react';

import AntiReact from './../Helpers/AntiReact.js'

var HC_LOAD_INIT = false; //React shit
var _hcwp = [];

export default class HyperComments extends React.Component {

    constructor(props) {
        super(props);
    }

    render () {
        return (
            <div id="hypercomments_widget"></div>
        );
    }

    componentWillUnmount() {
        console.log('HyperComments: componentWillUnmount');
        document.getElementById(this.props.id).remove();
    }

    componentDidMount() {
        console.log('HyperComments: componentDidMount');

        AntiReact.scriptJS(
            this.props.id,
            "//w.hypercomments.com/widget/hc/91700/en/widget.js",
            (e) => {
                console.log('HyperComments:LOADED: ' + this.props.id);
                //HC_LOAD_INIT = true;
                _hcwp = window._hcwp || [];
                _hcwp.push({widget:"Stream", widget_id: 91700});
            }
        );
    }
}