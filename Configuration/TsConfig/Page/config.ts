mod.SHARED {
	defaultLanguageFlag = de
	defaultLanguageLabel = Deutsch
}


RTE.default {
	preset = full

	config {
        tt_content.bodytext {
            preset = full
            types.text.preset = full
        }
    }
}


RTE.default.FE < RTE.default

TCEFORM.tt_content {
	header_layout.altLabels.0 = Überschrift h1 (Standard)
	header_layout.altLabels.1 = Überschrift h1
	header_layout.altLabels.2 = Überschrift h2
	header_layout.altLabels.3 = Überschrift h3
	header_layout.altLabels.4 = Überschrift h4
	header_layout.altLabels.5 = Überschrift h5
}
