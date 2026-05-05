import React from 'react';
import { View, Text } from 'react-native';

export default function Coder() {
  return (
    <View style={{ flex: 1, backgroundColor: '#FDFCF7', justifyContent: 'center', alignItems: 'center' }}>
      <Text style={{ fontSize: 24, color: '#0D9488' }}>Coder Portfolio</Text>
      <Text style={{ fontSize: 16, marginTop: 20, textAlign: 'center', paddingHorizontal: 20 }}>
        Tech stack and coding projects.
      </Text>
    </View>
  );
}