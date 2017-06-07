import React from 'react';
import styled from 'styled-components';

/* Create a Heading component that'll render an <h1> tag with some styles */
const Heading = styled.h1`
  font-size: 1.5em;
  text-align: center;
  color: #0073aa;
`;

const Title = () => {
  return (
    <Heading>
      Hello from React, friend!
    </Heading>
  );
};

export default Title;
