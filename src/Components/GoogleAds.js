import React from 'react';

import AntiReact from './../Helpers/AntiReact';

var adsbygoogle = {}; // React is sh1t

export default class GoogleAds extends React.Component {

    constructor(props) {
        super(props);
        this.state = {loaded: false};
    }

    componentWillUnmount() {
        console.log('componentWillUnmount: GoogleAds');
        document.getElementById(this.props.id).remove();
    }

    componentDidMount() {
        console.log('componentDidMount: GoogleAds');

        var script = AntiReact.scriptJS(this.props.id, "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js");
        script.onload = (e) => {
            this.state.loaded = true;
            console.log('LOADED :'+this.props.id);
            (adsbygoogle = window.adsbygoogle || []).push({});
        };
        document.body.appendChild(script);
    }

    render() {
        return (
            <div>
                <ins
                    style={this.props.style}
                    className="adsbygoogle"
                    data-ad-client={this.props.client}
                    data-ad-slot={this.props.slot}
                />
            </div>
        );
    }
}