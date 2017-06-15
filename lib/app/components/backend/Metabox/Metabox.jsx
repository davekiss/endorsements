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
			endorsements: [],
		};
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(e) {
		e.preventDefault();
		const count = this.state.endorsements.length;
		const endorsements = this.state.endorsements.concat(count + 1);
		this.setState({endorsements});
	}

	render() {
		return (
			<Wrapper>
				<Title />
				<p>This page has {this.state.endorsements.length} endorsements.</p>
				<Button text="Add New" handler={this.handleClick} />
			</Wrapper>
		);
	}
}

export default Metabox;
