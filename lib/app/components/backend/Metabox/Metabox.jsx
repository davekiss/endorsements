import React from 'react';
import styled from 'styled-components';

import Title from 'components/backend/Title/Title.jsx';

/* Create a Heading component that'll render an <h1> tag with some styles */
const Wrapper = styled.section`
  padding: 4em;
  background: #ffffff;
`;

const Metabox = () => {
  return (
    <Wrapper>
      <Title />
    </Wrapper>
  );
};

export default Metabox;
