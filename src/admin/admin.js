import React from 'react';
import ReactDOM from 'react-dom';
import styled from 'styled-components';

const target = document.getElementById('endorsements');

/* Create a Title component that'll render an <h1> tag with some styles */
const Title = styled.h1`
  font-size: 1.5em;
  text-align: center;
  color: #0073aa;
`;

/* Create a Metabox component that'll render a <section> tag with some styles */
const Metabox = styled.section`
  padding: 4em;
  background: #ffffff;
`;

/* Use Title and Metabox like any other React component – except they're styled! */
const App = () => {
  return (
    <Metabox>
      <Title>
        Hello from React!
      </Title>
    </Metabox>
  )
}

const render = () => {
  ReactDOM.render(
    <App />,
    target,
  );
};

render();
