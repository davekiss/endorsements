import React, { Component } from 'react';
import styled from 'styled-components';

import Title from 'components/backend/Title/Title.jsx';
import Button from 'components/backend/Button/Button.jsx';

/* Create a Heading component that'll render an <h1> tag with some styles */
const Wrapper = styled.section`
  padding: 4em;
  background: #ffffff;
  text-align: center;
`;

class Metabox extends Component {
	constructor(props) {
		super(props);
		this.state = {
			trails: [],
		};
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(e) {
		e.preventDefault();
		const count = this.state.trails.length;
		const trails = this.state.trails.concat(count + 1);
		this.setState({trails});
	}

	render() {
		return (
			<Wrapper>
				<Title />
				<p>This park has {this.state.trails.length} trails.</p>
				<Button text="Add New" handler={this.handleClick} />
			</Wrapper>
		);
	}
}

export default Metabox;
