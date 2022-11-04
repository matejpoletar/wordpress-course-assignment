import React from 'react';
import { InspectorControls, BlockControls } from '@wordpress/block-editor';
import { CardOverlayEditor } from './components/card-overlay-editor';
import { CardOverlayOptions } from './components/card-overlay-options';
import { CardOverlayToolbar } from './components/card-overlay-toolbar';

export const CardOverlay = (props) => {
	return (
		<>
			<InspectorControls>
				<CardOverlayOptions {...props} />
			</InspectorControls>
			<BlockControls>
				<CardOverlayToolbar {...props} />
			</BlockControls>
			<CardOverlayEditor {...props} />
		</>
	);
};
