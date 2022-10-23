import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { props } from '@eightshift/frontend-libs/scripts';
import { CardOverlayOptions as CardOverlayOptionsComponent } from '../../../components/card-overlay/components/card-overlay-options';

export const CardOverlayOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('Card Overlay', 'infinum-academy')}>
			<CardOverlayOptionsComponent
				{...props('card-overlay', attributes, {
					setAttributes,
				})}
			/>
		</PanelBody>
	);
};
