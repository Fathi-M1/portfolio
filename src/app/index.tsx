import React from 'react';
import { View, Text, TouchableOpacity } from 'react-native';
import { router } from 'expo-router';

export default function Index() {
  return (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center', backgroundColor: '#FDFCF7' }}>
      <Text style={{ fontSize: 24, marginBottom: 20 }}>Welcome to the Portfolio</Text>
      <TouchableOpacity
        onPress={() => router.replace('/(tabs)')}
        style={{
          paddingHorizontal: 20,
          paddingVertical: 10,
          backgroundColor: '#0D9488',
          borderRadius: 8
        }}
      >
        <Text style={{ color: 'white', fontSize: 16 }}>Enter Navigation</Text>
      </TouchableOpacity>
    </View>
  );
}