import React, {Component} from 'react';
import {BrowserRouter, Route, Link} from 'react-router-dom';
import Frameworks from './pages/Frameworks';
import Patterns from './pages/Patterns';
import Homepage from './pages/Homepage';
import Principles from './pages/Principles';
import GoogleAds from './Components/GoogleAds';
import HyperComments from './Components/HyperComments';
import GoogleAnalytics from "./Components/GoogleAnalytics";

export default class App extends Component {

    render() {
        /*
         <GoogleAnalytics id="google_a_script"/>
         */


        return (
            <BrowserRouter id="UA-65730589-2">
                <div className="app">
                    <nav>
                        <Link className="mt" to="/">home</Link>
                        <Link to="/frameworks">Frameworks</Link>
                        <Link to="/patterns">Patterns</Link>
                        <Link to="/principles">Principles</Link>
                    </nav>

                    <Route exact path="/" component={Homepage}/>
                    <Route exact path="/frameworks" component={Frameworks}/>
                    <Route exact path="/patterns" component={Patterns}/>
                    <Route exact path="/principles" component={Principles}/>

                    <GoogleAds
                        id="bottom"
                        client="ca-pub-1647951743023830"
                        slot="1838502239"
                        style={{ display:'block', width:'728px', height:'90px',  marginLeft: 'auto', marginRight: 'auto', }}
                    />


                    <HyperComments id="hypercomments_script" widget={{ widget: 'Stream', widget_id: 91700 }} />

                </div>

            </BrowserRouter>
        );
    }
}

