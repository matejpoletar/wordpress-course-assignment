import React from 'react';
import { __ } from '@wordpress/i18n';
import { props, getOptions, checkAttr, getAttrKey, ComponentUseToggle } from '@eightshift/frontend-libs/scripts';
import { ParagraphOptions } from '../../paragraph/components/paragraph-options';
import { ImageOptions } from '../../../components/image/components/image-options';

import manifest from './../manifest.json';

export const QuoteOptions = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
		label = manifestTitle,
		quoteShowControls = true,

		showQuoteUse = false,
		showLabel = false,
	} = attributes;

	if (!quoteShowControls) {
		return null;
	}

	const quoteUse = checkAttr('quoteUse', attributes, manifest);

	return (
		<>
			<ComponentUseToggle
				label={label}
				checked={quoteUse}
				onChange={(value) => setAttributes({ [getAttrKey('quoteUse', attributes, manifest)]: value })}
				showUseToggle={showQuoteUse}
				showLabel={showLabel}
			/>

			{quoteUse &&
				<>
					<ImageOptions
						{...props('image', attributes, {
							setAttributes,
						})}
					/>
					<ParagraphOptions
						label={__('Quote', 'infinum-academy')}
						showLabel={true}
						{...props('quote', attributes, {
							options: getOptions(attributes, manifest),
						})}
					/>

					<ParagraphOptions
						label={__('Attribution', 'infinum-academy')}
						showLabel={true}
						showParagraphUse={true}
						{...props('attribution ', attributes, {
							options: getOptions(attributes, manifest),
						})}
					/>
				</>
			}
		</>
	);
};
