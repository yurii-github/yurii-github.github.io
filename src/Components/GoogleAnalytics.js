import React from 'react';
import AntiReact from './../Helpers/AntiReact.js'


let gaAdded = false;

export default class GoogleAnalytics extends React.Component {

    componentDidMount() {
        console.log('GoogleAnalytics: componentDidMount');

        if (!gaAdded) {
            AntiReact.scriptJS(
                this.props.id,
                `//www.google-analytics.com/analytics.js`,
                (e) => {
                    console.log('GoogleAnalytics:LOADED: ' + this.props.id);
                    ga('create', 'UA-65730589-2', 'auto'); // eslint-disable-line
                    ga('send', 'pageview'); // eslint-disable-line
                }
            );
            gaAdded = true;
        } else {
            ga('send', 'pageview'); // eslint-disable-line
        }
    }

    componentWillUnmount() {
        console.log('componentWillUnmount')
    }

    componentWillUpdate() {
        console.log('componentWillUpdate')
    }

    componentDidUpdate() {
        console.log('componentDidUpdate')
    }

    render() {
        return null;
    }

}
