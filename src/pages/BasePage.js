import React from 'react';

export default class BasePage extends  React.Component {
    render() {
        return (
          <div></div>
        );
    }
}

BasePage.defaultProps = {
    title: "-"
};