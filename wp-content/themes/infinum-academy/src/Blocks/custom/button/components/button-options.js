import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { props } from '@eightshift/frontend-libs/scripts';
import { ButtonOptions as ButtonOptionsComponent } from '../../../components/button/components/button-options';

export const ButtonOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('Button', 'infinum-academy')}>
			<ButtonOptionsComponent
				{...props('button', attributes, {
					setAttributes,
				})}
			/>
		</PanelBody>
	);
};
