import React from 'react';
import ReactDOM from 'react-dom';
import { AppContainer } from 'react-hot-loader'
import App from 'containers/backend/App/App.jsx';

const target = document.getElementById('trails');

const render = () => {
  ReactDOM.render(
    <AppContainer>
      <App />
    </AppContainer>,
    target,
  );
};

render();

if (module.hot) {
  module.hot.accept(() => {
    render();
  });
}
