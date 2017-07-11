import React, { Component } from 'react';
import styled from 'styled-components';

import Client from 'utils/Client.js';
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

	componentDidMount() {
		Client.posts().then( data => {
			this.setState({trails: data});
		}).catch( error => {
			console.log(error);
		});
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
				{
					this.state.trails.map( trail => {
						return (
							<h2>{trail.title.rendered}</h2>
						)
					})
				}
			</Wrapper>
		);
	}
}

export default Metabox;
