import React, { Component } from 'react';
import styled from 'styled-components';

import Title from 'components/backend/Title/Title.jsx';
import Button from 'components/backend/Button/Button.jsx';

/* Create a Heading component that'll render an <h1> tag with some styles */
const Wrapper = styled.section`
  padding: 4em;
  background: #ffffff;
`;

class Metabox extends Component {
	constructor(props) {
		super(props);
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(e) {
		e.preventDefault();
		console.log('Add a new endorsement here!');
	}

	render() {
		return (
			<Wrapper>
				<Title />
				<Button text="Add New" handler={this.handleClick} />
			</Wrapper>
		);
	}
}

export default Metabox;
