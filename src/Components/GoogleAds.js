import React from 'react';
import AntiReact from './../Helpers/AntiReact';

export default class GoogleAds extends React.Component {

    constructor(props) {
        super(props);
        this.state = {loaded: false};
    }

    componentWillUnmount() {
        console.log('GoogleAds: componentWillUnmount');
        document.getElementById(this.props.id).remove();
    }

    componentDidMount() {
        console.log('GoogleAds: componentDidMount');

        AntiReact.scriptJS(
            this.props.id,
            "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",
            (e) => {
                this.setState({loaded: true});
                console.log('GoogleAds:LOADED: ' + this.props.id);
                (adsbygoogle = window.adsbygoogle || []).push({}); // eslint-disable-line
            }
        );
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