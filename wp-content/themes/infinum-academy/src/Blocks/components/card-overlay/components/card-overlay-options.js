import React from 'react';
import { props, getOptions, checkAttr, getAttrKey } from '@eightshift/frontend-libs/scripts';
import { LinkEditComponent } from '@eightshift/frontend-libs/scripts/components';
import { ImageOptions } from '../../image/components/image-options';
import { HeadingOptions } from '../../heading/components/heading-options';
import { ParagraphOptions } from '../../paragraph/components/paragraph-options';
import manifest from './../manifest.json';

export const CardOverlayOptions = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;
	
	const {
		setAttributes,
		label = manifestTitle
	} = attributes;

	const cardOverlayUrl = checkAttr('cardOverlayUrl', attributes, manifest);

	return (
		<>
			<ImageOptions
				{...props('image', attributes)}
				showImageUse
				showLabel
			/>

			<LinkEditComponent 
				url={cardOverlayUrl} 
				setAttributes={setAttributes}
				title={label} 
				urlAttrName={getAttrKey('cardOverlayUrl', attributes, manifest)} 
			/>

			<HeadingOptions
				{...props('heading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				showHeadingUse
				showLabel
			/>

			<ParagraphOptions
				{...props('paragraph', attributes, {
					options: getOptions(attributes, manifest),
				})}
				showParagraphUse
				showLabel
			/>
		</>
	);
};
