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

	const cardAlign = checkAttr('cardAlign', attributes, manifest);

	return (
		<>
			<HeadingToolbar
				{...props('heading', attributes, {
					options: getOptions(attributes, manifest),
				})}
			/>

			<AlignmentToolbar
				value={cardAlign}
				options={getOption('cardAlign', attributes, manifest)}
				label={sprintf(__('%s content align', 'infinum-academy'), manifestTitle)}
				onChange={(value) => setAttributes({ [getAttrKey('cardAlign', attributes, manifest)]: value })}
				type={AlignmentToolbarType.HORIZONTAL}
			/>
		</>
	);
};

