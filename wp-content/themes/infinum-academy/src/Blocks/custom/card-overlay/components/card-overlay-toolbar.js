import React from 'react';
import { props } from '@eightshift/frontend-libs/scripts';
import { CardOverlayToolbar as CardOverlayToolbarComponent } from '../../../components/card-overlay/components/card-overlay-toolbar';

export const CardOverlayToolbar = ({ attributes, setAttributes }) => {
	return (
		<CardOverlayToolbarComponent
			{...props('card-overlay', attributes, {
				setAttributes,
			})}
		/>
	);
};