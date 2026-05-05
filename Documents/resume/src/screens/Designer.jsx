import React from 'react';
import { View, Text } from 'react-native';

export default function Designer() {
  return (
    <View style={{ flex: 1, backgroundColor: '#FDFCF7', justifyContent: 'center', alignItems: 'center' }}>
      <Text style={{ fontSize: 24, color: '#F97316' }}>Designer Portfolio</Text>
      <Text style={{ fontSize: 16, marginTop: 20, textAlign: 'center', paddingHorizontal: 20 }}>
        Creative work and design projects.
      </Text>
    </View>
  );
}