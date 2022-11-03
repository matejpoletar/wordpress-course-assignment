import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { props } from '@eightshift/frontend-libs/scripts';
import { HeadingOptions } from '../../../components/heading/components/heading-options';
import { ParagraphOptions } from '../../../components/paragraph/components/paragraph-options';


export const BorderedGridOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('BorderedGrid', 'infinum-academy')}>
			<HeadingOptions
				{...props('headingOne', attributes, {
					setAttributes,
				})}
			/>
			<ParagraphOptions
				{...props('paragraphOne', attributes, {
					setAttributes,
				})}
			/>

			<HeadingOptions
				{...props('headingTwo', attributes, {
					setAttributes,
				})}
			/>
			<ParagraphOptions
				{...props('paragraphTwo', attributes, {
					setAttributes,
				})}
			/>

			<HeadingOptions
				{...props('headingThree', attributes, {
					setAttributes,
				})}
			/>
			<ParagraphOptions
				{...props('paragraphThree', attributes, {
					setAttributes,
				})}
			/>

			<HeadingOptions
				{...props('headingFour', attributes, {
					setAttributes,
				})}
			/>
			<ParagraphOptions
				{...props('paragraphFour', attributes, {
					setAttributes,
				})}
			/>
		</PanelBody>
	);
};
