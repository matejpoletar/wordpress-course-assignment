import React from 'react';
import { __ } from '@wordpress/i18n';
import { ColorPaletteCustom, icons, getOption, checkAttr, getAttrKey, ComponentUseToggle, IconLabel, CustomSelect } from '@eightshift/frontend-libs/scripts';
import manifest from './../manifest.json';

export const HeadingOptions = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
		label = manifestTitle,
		headingShowControls = true,

		showHeadingUse = false,
		showLabel = false,
		showHeadingColor = true,
		showHeadingFont = true,
		showHeadingSize = true,
		showHeadingWeight = true
	} = attributes;

	if (!headingShowControls) {
		return null;
	}

	const headingUse = checkAttr('headingUse', attributes, manifest);
	const headingColor = checkAttr('headingColor', attributes, manifest);
	const headingSize = checkAttr('headingSize', attributes, manifest);
	const headingWeight = checkAttr('headingWeight', attributes, manifest);
	const headingFont = checkAttr('headingFont', attributes, manifest);

	return (
		<>
			<ComponentUseToggle
				label={label}
				checked={headingUse}
				onChange={(value) => setAttributes({ [getAttrKey('headingUse', attributes, manifest)]: value })}
				showUseToggle={showHeadingUse}
				showLabel={showLabel}
			/>

			{headingUse &&
				<>
					{showHeadingColor &&
						<ColorPaletteCustom
							label={<IconLabel icon={icons.color} label={__('Color', 'infinum-academy')} />}
							colors={getOption('headingColor', attributes, manifest, true)}
							value={headingColor}
							onChange={(value) => setAttributes({ [getAttrKey('headingColor', attributes, manifest)]: value })}
						/>
					}

					{showHeadingSize &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Font size', 'infinum-academy')} />}
							value={headingSize}
							options={getOption('headingSize', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('headingSize', attributes, manifest)]: value })}
							simpleValue
							isClearable={false}
							isSearchable={false}
						/>
					}

					{showHeadingWeight &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Text weight', 'infinum-academy')} />}
							value={headingWeight}
							options={getOption('headingWeight', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('headingWeight', attributes, manifest)]: value })}
							isClearable={false}
							isSearchable={false}
							simpleValue />
					}

					{showHeadingFont &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Font family', 'infinum-academy')} />}
							value={headingFont}
							options={getOption('headingFont', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('headingFont', attributes, manifest)]: value })}
							simpleValue
							isClearable={false}
							isSearchable={false} />
					}
				</>
			}

		</>
	);
};
