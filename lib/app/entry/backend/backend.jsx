import React from 'react';
import ReactDOM from 'react-dom';
import styled from 'styled-components';

import Metabox from 'components/backend/Metabox/Metabox.jsx';

const target = document.getElementById('endorsements');

/* Use Title and Metabox like any other React component – except they're styled! */
const App = () => {
  return (
    <Metabox />
  )
};

const render = () => {
  ReactDOM.render(
    <App />,
    target,
  );
};

render();
