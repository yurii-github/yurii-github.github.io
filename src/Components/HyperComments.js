import React from 'react';
import PropTypes from 'prop-types';
import AntiReact from './../Helpers/AntiReact.js'


let hcAdded = false;

export default class HyperComments extends React.Component {

    render () {
        return (
            <div id="hypercomments_widget"></div>
        );
    }

    componentWillUnmount() {
        console.log('HyperComments: componentWillUnmount');
    }

    componentDidMount() {
        console.log('HyperComments: componentDidMount');

        if(!hcAdded) {
            AntiReact.scriptJS(
                this.props.id,
                `//w.hypercomments.com/widget/hc/${this.props.widget.widget_id}/${this.props.lang}/widget.js`,
                (e) => {
                    console.log('HyperComments:LOADED: ' + this.props.id);
                }
            );
            hcAdded = true;
        }

        if (typeof HC !== 'undefined') {
            console.log('HC NOT UNDEFINED')
        } else {
            window.HCReady = (e) => {
                console.log('HC READY');
                if (typeof HC === 'undefined') {
                    console.error('HC is udnefined');
                    return;
                }
                // BUG: cannot delcare HC in react. use window.HC
                HC.widget(this.props.widget.widget, this.props.widget); // eslint-disable-line
            }
       }

    }
}

HyperComments.defaultProps = {
    lang: 'en'
};

HyperComments.propTypes = {
    widget: PropTypes.object.isRequired,
    lang: PropTypes.string
};