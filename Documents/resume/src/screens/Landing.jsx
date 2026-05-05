import React from 'react';
import { View, Text, TouchableOpacity } from 'react-native';

export default function Landing({ navigation }) {
  return (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center', backgroundColor: '#FDFCF7' }}>
      <TouchableOpacity
        onPress={() => navigation.navigate('Portfolio')}
        style={{
          paddingHorizontal: 30,
          paddingVertical: 15,
          margin: 10,
          backgroundColor: '#0D9488',
          borderRadius: 8
        }}
      >
        <Text style={{ color: 'white', fontSize: 18 }}>Coder</Text>
      </TouchableOpacity>
      <TouchableOpacity
        onPress={() => navigation.navigate('Portfolio')}
        style={{
          paddingHorizontal: 30,
          paddingVertical: 15,
          margin: 10,
          backgroundColor: '#F97316',
          borderRadius: 8
        }}
      >
        <Text style={{ color: 'white', fontSize: 18 }}>Designer</Text>
      </TouchableOpacity>
    </View>
  );
}