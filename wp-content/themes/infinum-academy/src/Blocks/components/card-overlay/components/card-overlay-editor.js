import React, { useMemo } from 'react';
import { __ } from '@wordpress/i18n';
import { checkAttr, getUnique, props } from '@eightshift/frontend-libs/scripts';
import { ImageEditor } from '../../image/components/image-editor';
import { HeadingEditor } from '../../heading/components/heading-editor';
import { ParagraphEditor } from '../../paragraph/components/paragraph-editor';
import manifest from './../manifest.json';

export const CardOverlayEditor = (attributes) => {
	const unique = useMemo(() => getUnique(), []);

	const {
		componentClass,
	} = manifest;

	const {
		setAttributes
	} = attributes;

	const cardOverlayContent = checkAttr('cardOverlayContent', attributes, manifest);

	return (
		<div className={componentClass} data-id={unique}>
			<ImageEditor
				{...props('image', attributes, {
					blockClass: componentClass,
				})}
			/>

			<HeadingEditor
				{...props('heading', attributes, {
					blockClass: componentClass,
				})}
			/>

			<ParagraphEditor
				{...props('paragraph', attributes, {
					blockClass: componentClass,
				})}
			/>
		</div>
	);
};
