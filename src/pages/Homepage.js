import React from 'react';
import BasePage from './BasePage';

const skills = [
    {title: '<b>Storages</b>'},
    {title: 'MySQL', rating: 6},
    {title: 'mongoDB', rating: 0},
    {title: 'Sqlite', rating: 5},
    {title: 'Oracle ', rating: 0},
    {title: 'postreSQL', rating: 1},
    {title: 'MSSQL', rating: 1},
    {title: '<b>Languages &amp; Markups</b>'},
    {title: 'ASP .NET', rating: 4},
    {title: 'Bash', rating: 5},
    {title: 'CSS', rating: 8},
    {title: 'Javascript', rating: 9},
    {title: 'PHP', rating: 10},
    {title: 'Python', rating: 0},
    {title: 'SOAP/XML', rating: 5},
    {title: 'React', rating: 4},
    {title: 'Redis', rating: 1},
    {title: 'RegExp', rating: 8},
    {title: 'RESTful', rating: 8},
    {title: 'Ruby Rails', rating: 0},
    {title: '<b>Collaboration</b>'},
    {title: 'Mantis', rating: 0},
    {title: 'JIRA', rating: 10},
    {title: 'Redmine', rating: 4},
    {title: 'Bugzilla', rating: 0},
    {title: 'Git', rating: 10},
    {title: 'SVN', rating: 7},
    {title: '<b>Technologies</b>'},
    {title: 'RabbitMQ', rating: 1},
    {title: 'PHPUnit', rating: 7},
    {title: 'Bootstrap', rating: 7},
    {title: 'Docker', rating: 7},
    {title: 'TravisCI', rating: 7},
    {title: 'Jenkins', rating: 3},
    {title: 'SVN', rating: 7},
];


export default class Homepage extends BasePage {

    componentWillUnmount() {
        console.log('Homepage: componentWillUnmount');
        // CSS
        let link = document.getElementById('homepage_css');
        if(link) {
            link.remove();
        }
    }

    componentDidMount() {
        console.log('Homepage: componentDidMount');

        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var maxStarts = 10;
        var dl = document.getElementById('skills');

        skills.forEach((skill) => {
            var _dt = document.createElement('dt');
            _dt.innerHTML = skill.title;
            var _dd = document.createElement('dd');
            _dd.innerHTML = this.rating(star, skill.rating, maxStarts);
            dl.appendChild(_dt);
            dl.appendChild(_dd);
        });



        // RESIZE
        window.addEventListener('resize', function(e){
            //TODO: cont width 80%
            var articleEl = document.getElementsByTagName('article')[0];
            var effectiveW = Math.round(window.innerWidth*0.8) - 40;
            var skillsW = 270;

            if(effectiveW >= 770) {
                let articleW = effectiveW - skillsW;
                articleEl.style['width'] = articleW+'px';
            } else {
                let articleW = effectiveW;
                articleEl.style['width'] = articleW+'px';
            }
        });

        window.dispatchEvent(new Event('resize'));

        // CSS
        (function(){
            var styles = document.createElement('link');
            styles.rel = 'stylesheet';
            styles.id = "homepage_css";
            styles.type = 'text/css';
            styles.media = 'screen';
            styles.href = '/about.css';
            document.getElementsByTagName('head')[0].appendChild(styles);
        })();



    }


    rating(star, rate, maxStarts) {
        var val = parseInt(rate, 10);
        var rating = '';
        if (!isNaN(val)) {
            for (let i = 1; i <= val; i++) {
                rating += star.full;
            }
            for (let i = 0; i < maxStarts - val; i++) {
                rating += star.empty;
            }
        }
        return rating;
    }


    render() {
        document.title = this.props.title;
        return (
        <div>
            <h1>{this.props.title}</h1>
            <div className="container">


                <article>
                    <p> Hello.</p>
                    <p>I'm Yurii. That's all you should really know about me.</p>
                    <p>All info here is my subject view on the field. Any comments are welcome. If you agree or not, maybe you have some intel that can change my view on things.</p>

                    <h2>PHP Frameworks</h2>
                    <p>I do track some of PHP frameworks and CMS. I provide them with my comments in comparision table</p>

                    <h2>Patterns</h2>
                    <p>Many of patterns are just regular OOP principles which people ignore to know. Instead, they create ton of useless hipster names.</p>
                    <p>To simplify things I provide aliases for patterns like 'Wrapper', because most of those patterns are simply basic or a bit complex wrappers over other objects or classes.</p>
                    <p>I've added to patterns so-called by hipsters 'antipatterns' because they still are patterns and are valid in many cases.</p>

                    <h2>Principles</h2>
                    <p>Contains programming principles, at least, known as. For most part it is just another nonsense.</p>


                </article>

                <aside>
                    <dl id="skills"></dl>
                    <div className="clear-both"></div>
                </aside>
                <div className="clear-both"></div>

            </div>
        </div>
        );
    }


}

Homepage.defaultProps = {
    title: "Homepage"
};