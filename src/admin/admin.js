import React from 'react';
import ReactDOM from 'react-dom';

const target = document.getElementById('endorsements');

const Metabox = () => {
  return (
    <div>
      <h1>Hello from React!</h1>
    </div>
  )
}

const render = () => {
  ReactDOM.render(
    <Metabox />,
    target,
  );
};

render();
