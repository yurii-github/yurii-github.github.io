import React, {Component} from 'react';
//import GoogleAnalytics from './components/GoogleAnalytics';

import {BrowserRouter, Route, Link} from 'react-router-dom';
import Frameworks from './pages/Frameworks.js';


export default class App extends Component {

    onUpdate() {
        console.log('sssssssss')
    }

    render() {
        return (
            <BrowserRouter onUpdate="{this.onUpdate}">
                <div className="app">
                    <nav>
                        <Link className="mt" to="/">home</Link>
                        <Link to="/about">About</Link>
                        <Link to="/topics">Topics</Link>
                    </nav>

                    <Route exact path="/" component={Frameworks}/>
                    <Route path="about" component={Frameworks}/>
                    <Route path="principles" component={Frameworks}/>
                </div>
            </BrowserRouter>
        );
    }
}

