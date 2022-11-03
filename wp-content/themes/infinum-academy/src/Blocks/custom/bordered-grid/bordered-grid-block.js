import React from 'react';
import { InspectorControls, BlockControls } from '@wordpress/block-editor';
import { BorderedGridEditor } from './components/bordered-grid-editor';
import { BorderedGridOptions } from './components/bordered-grid-options';
import { BorderedGridToolbar } from './components/bordered-grid-toolbar';

export const BorderedGrid = (props) => {
	return (
		<>
			<InspectorControls>
				<BorderedGridOptions {...props} />
			</InspectorControls>
			<BlockControls>
				<BorderedGridToolbar {...props} />
			</BlockControls>
			<BorderedGridEditor {...props} />
		</>
	);
};
