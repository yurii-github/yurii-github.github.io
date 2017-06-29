import React, { Component } from 'react';

//TODO: IMPLEMENT!!! use 3rd party for now
class GoogleAnalytics extends React.Component {

    constructor(props) {
       // React.Component.call(this, props);
        super();
    };


    componentDidMount() {
        console.log('componentDidMount')
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
        return <h1>Hello, {this.props.name}</h1>;
    };



}

export default GoogleAnalytics;