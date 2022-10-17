import React from 'react';
import { __ } from '@wordpress/i18n';
import { ColorPaletteCustom, icons, getOption, checkAttr, getAttrKey, ComponentUseToggle, IconLabel, CustomSelect, IconToggle, BlockIcon, SimpleHorizontalSingleSelect } from '@eightshift/frontend-libs/scripts';
import manifest from '../manifest.json';

export const ListsOptions = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
		label = manifestTitle,
		listsShowControls = true,

		showListsUse = false,
		showLabel = false,
		showListsColor = true,
		showListsSize = true,
		showListsColorOnlyMarker = true,
		showListsOrdered = true,
	} = attributes;

	if (!listsShowControls) {
		return null;
	}

	const listsUse = checkAttr('listsUse', attributes, manifest);
	const listsColor = checkAttr('listsColor', attributes, manifest);
	const listsSize = checkAttr('listsSize', attributes, manifest);
	const listsColorOnlyMarker = checkAttr('listsColorOnlyMarker', attributes, manifest);
	const listsOrdered = checkAttr('listsOrdered', attributes, manifest);

	return (
		<>
			<ComponentUseToggle
				label={label}
				checked={listsUse}
				onChange={(value) => setAttributes({ [getAttrKey('listsUse', attributes, manifest)]: value })}
				showUseToggle={showListsUse}
				showLabel={showLabel}
			/>

			{listsUse &&
				<>
					{showListsColor &&
						<ColorPaletteCustom
							label={<IconLabel icon={icons.color} label={__('Color', 'infinum-academy')} />}
							colors={getOption('listsColor', attributes, manifest, true)}
							value={listsColor}
							onChange={(value) => setAttributes({ [getAttrKey('listsColor', attributes, manifest)]: value })}
						/>
					}

					{showListsSize &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Font size', 'infinum-academy')} />}
							value={listsSize}
							options={getOption('listsSize', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('listsSize', attributes, manifest)]: value })}
							isClearable={false}
							isSearchable={false}
							simpleValue
						/>
					}

					{showListsOrdered &&
						<SimpleHorizontalSingleSelect
							label={__('List type', 'infinum-academy')}
							value={listsOrdered}
							options={getOption('listsOrdered', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('listsOrdered', attributes, manifest)]: value })}
						/>
					}
				
					{showListsColorOnlyMarker &&
						<IconToggle
							icon={<BlockIcon iconName='es-list-item' />}
							label={__('Show color only on list markers', 'infinum-academy')}
							checked={listsColorOnlyMarker}
							onChange={(value) => setAttributes({ [getAttrKey('listsColorOnlyMarker', attributes, manifest)]: value })}
						/>
					}
				</>
			}

		</>
	);
};
