import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { props } from '@eightshift/frontend-libs/scripts';
import { ParagraphOptions as ParagraphOptionsComponent } from '../../../components/paragraph/components/paragraph-options';

export const ParagraphOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('Paragraph', 'infinum-academy')}>
			<ParagraphOptionsComponent
				{...props('paragraph', attributes, {
					setAttributes,
				})}
			/>
		</PanelBody>
	);
};
