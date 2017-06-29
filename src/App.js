import React, {Component} from 'react';
import {BrowserRouter, Route, Link} from 'react-router-dom';
//import GoogleAnalytics from './components/GoogleAnalytics';

//import BrowserRouter from 'react-g-analytics';
import Frameworks from './pages/Frameworks.js';
import About from './pages/About.js';


export default class App extends Component {

    render() {
        return (
            <BrowserRouter id="UA-65730589-2">
                <div className="app">
                    <nav>
                        <Link className="mt" to="/">home</Link>
                        <Link to="/about">About</Link>
                    </nav>

                    <Route exact path="/" component={Frameworks}/>
                    <Route exact path="/about" component={About}/>
                </div>
            </BrowserRouter>
        );
    }
}

