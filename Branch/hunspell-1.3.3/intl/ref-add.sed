/^# Packages using this file: / {
  s/# Packages using this file://
  ta
  :a
  s/ hunspell / hunspell /
  tb
  s/ $/ hunspell /
  :b
  s/^/# Packages using this file:/
}
