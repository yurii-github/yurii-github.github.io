import React from 'react';

// copy paste from https://github.com/wonism/react-google-ads

export default class GoogleAds extends React.Component {

    constructor(props) {
        super(props);


    }
    componentDidMount() {
        this.forceUpdate();
/*
        ((d, s, id, cb) => {
            console.log(d,s,id,cb)
            const element = d.getElementsByTagName(s)[0];
            const fjs = element;
            let js = element;

            js = d.createElement(s);
            js.id = id;
            js.src = '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js';
            fjs.parentNode.insertBefore(js, fjs);
            js.onload = cb;
            js.async = "async";
        })(document, 'script', 'google-ads-sdk', () => {
           // (adsbygoogle = window.adsbygoogle || []).push({});
        });*/
    }

    render() {
        return (
        <div>
            <script async="async" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins
                className={"adsbygoogle"}
                data-ad-client={this.props.client}
                data-ad-slot={this.props.slot}
                style={this.props.style}
            />
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        </div>
        );
    }
}