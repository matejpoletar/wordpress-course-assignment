import React, { useMemo } from 'react';
import { outputCssVariables, getUnique, props } from '@eightshift/frontend-libs/scripts';
import { HeadingEditor } from '../../../components/heading/components/heading-editor';
import { ParagraphEditor } from '../../../components/paragraph/components/paragraph-editor';
import manifest from './../manifest.json';
import globalManifest from './../../../manifest.json'; 

export const BorderedGridEditor = ({ attributes, setAttributes }) => {
	const unique = useMemo(() => getUnique(), []);

	const {
		blockClass	
	} = attributes;

	const {
		selectorClass
	} = manifest;

	return (
		<div className={blockClass} data-id={unique}>
			{outputCssVariables(attributes, manifest, unique, globalManifest)}
			<div className={selectorClass}>
				<HeadingEditor
					{...props("headingOne", attributes, {
						setAttributes,
					})}
				/>

				<ParagraphEditor
					{...props("paragraphOne", attributes, {
						setAttributes,
					})}
				/>
			</div>

			<div className={selectorClass}>
				<HeadingEditor
					{...props("headingTwo", attributes, {
						setAttributes,
					})}
				/>

				<ParagraphEditor
					{...props("paragraphTwo", attributes, {
						setAttributes,
					})}
				/>
			</div>

			<div className={selectorClass}>
				<HeadingEditor
					{...props("headingThree", attributes, {
						setAttributes,
					})}
				/>

				<ParagraphEditor
					{...props("paragraphThree", attributes, {
						setAttributes,
					})}
				/>
			</div>

			<div className={selectorClass}>
				<HeadingEditor
					{...props("headingFour", attributes, {
						setAttributes,
					})}
				/>

				<ParagraphEditor
					{...props("paragraphFour", attributes, {
						setAttributes,
					})}
				/>
			</div>
		</div>
	);
};
