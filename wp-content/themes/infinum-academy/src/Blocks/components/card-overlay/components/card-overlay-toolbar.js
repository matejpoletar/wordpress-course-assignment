import React from 'react';
import { __, sprintf } from '@wordpress/i18n';
import { checkAttr, getAttrKey, props, getOptions, getOption, AlignmentToolbar, AlignmentToolbarType } from '@eightshift/frontend-libs/scripts';
import { HeadingToolbar } from '../../heading/components/heading-toolbar';
import manifest from './../manifest.json';

export const CardOverlayToolbar = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
	} = attributes;

	const cardOverlayAlign = checkAttr('cardOverlayAlign', attributes, manifest);

	return (
		<>
			<HeadingToolbar
				{...props('heading', attributes, {
					options: getOptions(attributes, manifest),
				})}
			/>

			<AlignmentToolbar
				value={cardOverlayAlign}
				options={getOption('cardOverlayAlign', attributes, manifest)}
				label={sprintf(__('%s content align', 'infinum-academy'), manifestTitle)}
				onChange={(value) => setAttributes({ [getAttrKey('cardOverlayAlign', attributes, manifest)]: value })}
				type={AlignmentToolbarType.HORIZONTAL}
			/>
		</>
	);
};

