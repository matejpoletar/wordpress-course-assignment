import React from 'react';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';
import { checkAttr, getAttrKey } from '@eightshift/frontend-libs/scripts';
import manifest from './../manifest.json';

export const CardOverlayEditor = (attributes) => {
	const {
		componentClass,
	} = manifest;

	const {
		setAttributes
	} = attributes;

	const cardOverlayContent = checkAttr('cardOverlayContent', attributes, manifest);

	return (
		<RichText
			placeholder={__('Add content', 'infinum-academy')}
			className={componentClass}
			onChange={(value) => setAttributes({ [getAttrKey('cardOverlayContent', attributes, manifest)]: value })}
			value={cardOverlayContent}
			allowedFormats={['core/bold', 'core/link']}
		/>
	);
};
