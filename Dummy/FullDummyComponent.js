import React, { Component } from 'react';

class FullDummy extends React.Component {

    constructor(props) {
        super(props);
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

export default FullDummy;